<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data Statistik Total
        $totalPesanan = Pesanan::count();
        $totalPendapatan = Pesanan::where('status', 'completed')->sum('total_harga_produk');
        $totalPelanggan = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->count();

        // 2. Data untuk Chart Combo Pesanan & Pendapatan Per Bulan
        $queryBulanan = Pesanan::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as jumlah_pesanan'),
            DB::raw('SUM(total_harga_produk) as total_pendapatan')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get()->keyBy('bulan'); // keyBy untuk memudahkan mapping

        $dataJumlahPesanan = array_fill(1, 12, 0);
        $dataPendapatanBulanan = array_fill(1, 12, 0);

        foreach ($queryBulanan as $bulan => $data) {
            $dataJumlahPesanan[$bulan] = $data->jumlah_pesanan;
            $dataPendapatanBulanan[$bulan] = $data->total_pendapatan;
        }

        // 3. Data Status Pesanan (Pie Chart)
        $statusPesananQuery = Pesanan::groupBy('status')
            ->select('status', DB::raw('count(*) as total'))
            ->pluck('total', 'status');

        // 4. Data untuk Mixed Chart Tren 7 Hari Terakhir
        $tanggalLabels = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggalLabels[] = Carbon::now()->subDays($i)->format('d M');
        }

        $trenQuery = DB::table('detail_pesanans')
            ->join('pesanans', 'detail_pesanans.pesanans_id', '=', 'pesanans.id')
            ->where('pesanans.created_at', '>=', Carbon::now()->subDays(7))
            ->select(
                DB::raw('DATE(pesanans.created_at) as tanggal'),
                DB::raw('SUM(detail_pesanans.kuantitas_produk) as total_produk'),
                DB::raw('COUNT(DISTINCT detail_pesanans.pesanans_id) as jumlah_pesanan')
            )
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get()
            ->keyBy('tanggal');


        $trenPenjualanProdukHarian = array_fill_keys($tanggalLabels, 0);
        $trenJumlahPesananHarian = array_fill_keys($tanggalLabels, 0);

        foreach ($trenQuery as $tanggal => $data) {
            $formattedDate = Carbon::parse($tanggal)->format('d M');
            if (isset($trenPenjualanProdukHarian[$formattedDate])) {
                $trenPenjualanProdukHarian[$formattedDate] = $data->total_produk;
                $trenJumlahPesananHarian[$formattedDate] = $data->jumlah_pesanan;
            }
        }

        // 5. Data untuk produk terlaris
        $pesanans = DB::table('detail_pesanans')
            ->select('produks_id', DB::raw('SUM(kuantitas_produk) as total_terjual'))
            ->groupBy('produks_id')
            ->orderByDesc('total_terjual')
            ->take(7)
            ->get();

        $produkTerlaris = $pesanans->map(function ($item) {
            $produk = Produk::find($item->produks_id);
            return (object) [
                'nama_produk' => $produk ? $produk->nama_produk : 'Produk Tidak Ditemukan',
                'size' => $produk ? $produk->size : '-',
                'total_terjual' => $item->total_terjual,
            ];
        });

        return view('admin.dashboard', [
            'totalPesanan' => $totalPesanan,
            'totalPendapatan' => $totalPendapatan,
            'totalPelanggan' => $totalPelanggan,
            'dataJumlahPesanan' => array_values($dataJumlahPesanan),
            'dataPendapatanBulanan' => array_values($dataPendapatanBulanan),
            'statusLabels' => $statusPesananQuery->keys(),
            'statusPesananData' => $statusPesananQuery->values(),
            'trenPenjualanProdukHarian' => array_values($trenPenjualanProdukHarian),
            'trenJumlahPesananHarian' => array_values($trenJumlahPesananHarian),
            'tanggalLabels' => array_keys($trenPenjualanProdukHarian),
            'produkTerlaris' => $produkTerlaris,
            'namaProdukTerlaris' => $produkTerlaris->pluck('nama_produk'),
            'jumlahProdukTerjual' => $produkTerlaris->pluck('total_terjual'),

        ]);
    }
}