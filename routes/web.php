<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;

// 🔹 Landing page
Route::get('/', function () {
    return view('landing'); // resources/views/landing.blade.php
})->name('landing');

// 🔹 Auth routes (login, register, dll)
Auth::routes();

// 🔹 Dashboard (Setelah login)
Route::get('/dashboard', [HomeController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// 🔹 Shop page
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// 🔹 Product Routes
Route::prefix('products')->middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'view'])->name('product.view');
    Route::post('/', [ProductController::class, 'create'])->name('product.create');
});

// 🔹 Home jika ingin route /home diarahkan juga
Route::get('/home', function () {
    return view('home'); // resources/views/home.blade.php
})->name('home');
