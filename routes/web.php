<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

//products
Route::get('/', [ProductController::class, 'view'])->name('product.view');
Route::post('/', [ProductController::class, 'create'])->name('product.create');

Route::get('/', function () {

    return view('landing');
});
//shop
Route::get('/shop', function () {
    return view('shop');
})->name('shop');

