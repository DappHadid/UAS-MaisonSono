<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/shop', function () {
    return view('shop');
})->name('shop');
