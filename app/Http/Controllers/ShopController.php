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
}
