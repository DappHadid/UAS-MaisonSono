<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Catatan: File ini diasumsikan sudah dimuat oleh RouteServiceProvider dengan:
|  - TANPA prefix URL otomatis '/admin'. URL akan persis seperti yang didefinisikan di bawah ini.
|  - TETAP DENGAN prefix nama rute 'admin.' (sehingga semua nama rute di bawah ini otomatis diawali admin.)
|  - middleware 'web' group.
|
| PERHATIAN: Karena tidak ada prefix URL '/admin', pastikan path rute di sini
| TIDAK BERKONFLIK dengan path rute di 'routes/web.php' Anda!
| Misalnya, jika 'routes/web.php' memiliki '/login', Anda mungkin perlu mengubah
| '/login' di bawah ini menjadi sesuatu yang unik seperti '/panel-login'.
*/

// // --- RUTE AUTENTIKASI ADMIN ---
// Route::middleware('guest:admin')->group(function () {
//     // URL: /login (langsung, tanpa /admin di depannya)
//     // Nama Rute: admin.login
//     Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

//     // URL: /login (method POST)
//     // Nama Rute: admin.login.submit
//     Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); // Disesuaikan agar tidak jadi admin.admin.login.submit
// });

// // --- RUTE ADMIN YANG TERAUTENTIKASI ---
// Route::middleware('auth:admin')->group(function () {
//     // Rute '/home' telah dihapus karena redirect login sekarang ke 'admin.manage-products.index'
//     // Anda masih bisa mendefinisikan halaman dashboard utama di sini jika perlu,
//     // misalnya dengan path '/dashboard-admin' agar unik.
//     // Route::get('/dashboard-admin', [AdminDashboardController::class, 'index'])->name('dashboard');

//     // URL: /logout (method POST)
//     // Nama Rute: admin.logout
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//     // --- MANAJEMEN PRODUK ---
//     // URL base: /manage-products
//     // Nama Rute base: admin.manage-products
//     Route::middleware('can:manage_products')->group(function () {
//         Route::resource('manage-products', ProdukController::class);
//     });

//     // --- MANAJEMEN PESANAN ---
//     // URL base: /manage-orders
//     // Nama Rute base: admin.manage-orders
//     Route::middleware('can:manage_orders')->group(function () {
//         Route::resource('manage-orders', PesananController::class);
//         // URL: /manage-orders/{pesanan}/update-status
//         // Nama Rute: admin.manage-orders.updateStatus
//         Route::patch('manage-orders/{pesanan}/update-status', [PesananController::class, 'updateStatus'])
//             ->name('manage-orders.updateStatus');
//     });

// });