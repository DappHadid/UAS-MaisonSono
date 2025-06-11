<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // 2. Data Chart Combo Pesanan & Pendapatan Per Bulan
        $queryBulanan = Pesanan::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as jumlah_pesanan'),
                DB::raw('SUM(total_harga_produk) as total_pendapatan')
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('bulan')->orderBy('bulan', 'asc')->get()->keyBy('bulan');

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
        
        $trenQuery = Pesanan::where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('tanggal')->orderBy('tanggal', 'asc')
            ->get([
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('SUM(total_harga_produk) as total_penjualan'),
                DB::raw('COUNT(id) as jumlah_pesanan')
            ])->keyBy('tanggal');

        $trenPenjualanHarian = array_fill_keys($tanggalLabels, 0);
        $trenJumlahPesananHarian = array_fill_keys($tanggalLabels, 0);
        foreach ($trenQuery as $tanggal => $data) {
            $formattedDate = Carbon::parse($tanggal)->format('d M');
            if (isset($trenPenjualanHarian[$formattedDate])) {
                $trenPenjualanHarian[$formattedDate] = $data->total_penjualan;
                $trenJumlahPesananHarian[$formattedDate] = $data->jumlah_pesanan;
            }
        }
        
        // 5. Data untuk produk terlaris (dioptimalkan)
        $produkTerlaris = DB::table('detail_pesanans')
            ->join('produks', 'detail_pesanans.produk_id', '=', 'produks.id') // Join dengan tabel produks
            ->select('produks.nama_produk', DB::raw('SUM(detail_pesanans.kuantitas_produk) as total_terjual'))
            ->groupBy('produks.id', 'produks.nama_produk')
            ->orderByDesc('total_terjual')
            ->take(7)
            ->get();

        // 6. Data untuk pengguna terbaru
        $latestUsers = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->latest()->take(5)->get();

        // Kirim semua data ke view
        return view('admin.manage-orders.dashboard', [
            'totalPesanan'          => $totalPesanan,
            'totalPendapatan'       => $totalPendapatan,
            'totalPelanggan'        => $totalPelanggan,
            'dataJumlahPesanan'     => array_values($dataJumlahPesanan),
            'dataPendapatanBulanan' => array_values($dataPendapatanBulanan),
            'statusLabels'          => $statusPesananQuery->keys(),
            'statusPesananData'     => $statusPesananQuery->values(),
            'trenPenjualanHarian'   => array_values($trenPenjualanHarian),
            'trenJumlahPesananHarian' => array_values($trenJumlahPesananHarian),
            'tanggalLabels'         => array_keys($trenPenjualanHarian),
            'produkTerlaris'        => $produkTerlaris,
            'latestUsers'           => $latestUsers,
        ]);
    }
}