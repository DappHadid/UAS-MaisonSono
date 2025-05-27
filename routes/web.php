<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

//products
Route::get('/product', [ProductController::class, 'view'])->name('product.view');
Route::post('/product', [ProductController::class, 'create'])->name('product.create');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::put('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::get('/', function () {

    return view('landing');
});
//shop
Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/analytics', function () {
//     return view('analytics');
// })->name('analytics');

// Route::get('/orders', function () {
//     return view('orders');
// })->name('orders');

// Route::get('/product', function () {
//     return view('product');
// })->name('product');

// Route::resource('product', ProductController::class);
// Route::get('/product', [ProductController::class, 'view'])->name('product.view');