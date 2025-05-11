<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('landing');
// });

//products
Route::get('/', [ProductController::class, 'view'])->name('product.view');
Route::post('/', [ProductController::class, 'create'])->name('product.create');
