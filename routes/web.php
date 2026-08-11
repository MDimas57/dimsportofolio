<?php

use Illuminate\Support\Facades\Route;

// Route untuk Halaman Utama Portofolio (Frontend)
Route::get('/', function () {
    return view('welcome');
});
