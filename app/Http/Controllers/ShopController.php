<?php

namespace App\Http\Controllers;

use App\Models\Produk;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Tampilkan halaman shop.
     */
    public function index()
    {
        $produk = Produk::all(); // Ambil semua produk dari database
        return view('shop', compact('produk')); // Kirim ke view shop.blade.php
    }

    /**
     * Tampilkan detail produk.
     */
    public function detail(Request $request)
    {
        $id = $request->query('id'); // Ambil ID dari URL query string
        $produk = Produk::findOrFail($id); // Cari produk berdasarkan ID, jika tidak ditemukan akan error 404

        return view('produkDetail', compact('produk'));
    }
}
