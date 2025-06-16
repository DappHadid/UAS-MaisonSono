<?php

use Illuminate\Support\Facades\Route;

// == KELOMPOK CONTROLLER UNTUK PENGGUNA BIASA (USER-FACING) ==
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProfileController;


// == KELOMPOK CONTROLLER UNTUK PANEL ADMIN ==
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\PesananController as AdminPesananController;

/* RUTE USER */
Route::get('/', function () { return view('user.landing'); })->name('landing');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/produk/{produk}', [ShopController::class, 'detail'])->name('produk.detail');
Route::view('/catalogue', 'user.catalogue')->name('catalogue');
Route::view('/discover', 'discover')->name('discover');
Route::view('/about', 'about')->name('about');
Route::view('/career', 'user.career')->name('career');
require __DIR__.'/auth.php';
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard-user', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('keranjang')->name('keranjang.')->group(function () {
        Route::get('/', [KeranjangController::class, 'index'])->name('index');
        Route::get('/add', [KeranjangController::class, 'addToKeranjang'])->name('add');
        Route::post('/update', [KeranjangController::class, 'updateQuantity'])->name('update');
        Route::get('/remove/{id}', [KeranjangController::class, 'removeItem'])->name('remove');
    });
});

/* RUTE ADMIN */
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth:admin')->group(function () {
        
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('manage-products', AdminProdukController::class)->middleware('can:manage_products');
        Route::resource('manage-orders', AdminPesananController::class)->middleware('can:manage_orders');
        Route::patch('manage-orders/{pesanan}/update-status', [AdminPesananController::class, 'updateStatus'])->name('manage-orders.updateStatus')->middleware('can:manage_orders');
    });
});