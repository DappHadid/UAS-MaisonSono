<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Pelanggan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalPesanan = Pesanan::count();
        $totalProduk = Produk::count();
        $totalPelanggan = Pelanggan::count();

        $pesananPerBulan = Pesanan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total')
            ->toArray();

        // Data status pesanan
        $statusPesananData = Pesanan::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total')
            ->toArray();

        // Label status pesanan
        $statusLabels = Pesanan::selectRaw('status')
            ->groupBy('status')
            ->pluck('status')
            ->toArray();

        // Tren penjualan harian 7 hari terakhir
        $trenPenjualanHarian = Pesanan::selectRaw('DATE(created_at) as tanggal, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->pluck('total')
            ->toArray();

        // Label tanggal tren penjualan harian, format tanggal ke 'd M' (contoh: 30 May)
        $tanggalLabels = Pesanan::selectRaw('DATE(created_at) as tanggal')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->pluck('tanggal')
            ->map(function($date) {
                return Carbon::parse($date)->format('d M');
            })
            ->toArray();

        // Kirim data ke view dengan path sesuai lokasi file blade Anda
        return view('admin.manage-orders.dashboard', compact(
            'totalPesanan', 'totalProduk', 'totalPelanggan',
            'pesananPerBulan', 'statusPesananData', 'statusLabels',
            'trenPenjualanHarian', 'tanggalLabels'
        ));
    }
}
