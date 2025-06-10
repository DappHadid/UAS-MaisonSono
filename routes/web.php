<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DashboardController;

// ===================================================
// GRUP UNTUK SEMUA RUTE PANEL ADMIN
// ===================================================
Route::prefix('admin')->name('admin.')->group(function () {

    // Rute untuk admin yang belum login (Tamu)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Rute untuk admin yang sudah login
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::middleware('can:manage_products')->group(function () {
            Route::resource('manage-products', ProdukController::class);
        });
    Route::middleware('can:manage_orders')->group(function () {
        Route::resource('manage-orders', PesananController::class);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::patch('manage-orders/{pesanan}/update-status', [PesananController::class, 'updateStatus'])
                ->name('manage-orders.updateStatus');
        });
    });
});