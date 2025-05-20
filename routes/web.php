<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {

    return view('landing');
});

Route::get('/shop', function () {
    return view('shop');
})->name('shop');