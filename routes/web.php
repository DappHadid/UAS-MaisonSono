<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesAnalyticsController;
use App\Http\Controllers\ProdukController;

// 🔹 Landing page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// 🔹 Auth routes (login, register, dll)
Auth::routes();

// 🔹 Dashboard (Setelah login)
Route::get('/dashboard', [HomeController::class, 'index'])
->name('dashboard')
->middleware('auth');

// 🔹 Shop page
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/produkDetail', [ShopController::class, 'detail'])->name('produk.detail');
Route::view('/catalogue', 'catalogue')->name('catalogue');
Route::view('/discover', 'discover')->name('discover');
// Route::view('/keranjang', 'keranjang')->name('keranjang');
Route::get('/add_to_keranjang', [KeranjangController::class, 'addToKeranjang'])->name('keranjang.add');
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::post('/keranjang/update', [KeranjangController::class, 'updateQuantity'])->name('keranjang.update');
Route::get('/keranjang/remove/{id}', [KeranjangController::class, 'removeItem'])->name('keranjang.remove');
Route::view('/about', 'about')->name('about');
Route::view('/career', 'career')->name('career');

// 🔹 Product Routes
Route::prefix('products')->middleware('auth')->group(function () {
    Route::get('/', [ProdukController::class, 'view'])->name('product.view');
    Route::post('/', [ProdukController::class, 'create'])->name('product.create');
});


// 🔹 Home jika ingin route /home diarahkan juga
Route::get('/home', function () {
    return view('home'); // resources/views/home.blade.php
})->name('home');
