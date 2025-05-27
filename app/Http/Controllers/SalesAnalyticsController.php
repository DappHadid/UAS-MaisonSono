<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Pesanan;

class SalesAnalyticsController extends Controller
{
    public function index()
    {
        // Total jumlah pesanan
        $totalOrders = Pesanan::count();

        // Total pendapatan (jumlah total_harga_produk dari semua pesanan)
        $totalRevenue = Pesanan::sum('total_harga_produk');

        // Produk terlaris (top 5) berdasarkan pivot 'pesanan_produk'
        $topProducts = DB::table('pesanan_produk')
            ->join('produk', 'pesanan_produk.produk_id', '=', 'produk.id')
            ->select('produk.nama_produk as name', DB::raw('SUM(pesanan_produk.jumlah) as total_sold'))
            ->groupBy('produk.nama_produk')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();

        // Penjualan harian 7 hari terakhir berdasarkan tanggal_pesanan
        $salesPerDay = Pesanan::select(DB::raw('DATE(tanggal_pesanan) as date'), DB::raw('SUM(total_harga_produk) as revenue'))
            ->where('tanggal_pesanan', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('analytics.sales', compact('totalOrders', 'totalRevenue', 'topProducts', 'salesPerDay'));
    }
}
