<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesAnalyticsController;

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
Route::view('/catalogue', 'catalogue')->name('catalogue');
Route::view('/discover', 'discover')->name('discover');
Route::view('/keranjang', 'keranjang')->name('keranjang');
Route::view('/about', 'about')->name('about');
Route::view('/career', 'career')->name('career');

// 🔹 Product Routes
Route::prefix('products')->middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'view'])->name('product.view');
    Route::post('/', [ProductController::class, 'create'])->name('product.create');
});


// 🔹 Home jika ingin route /home diarahkan juga
Route::get('/home', function () {
    return view('home'); // resources/views/home.blade.php
})->name('home');
