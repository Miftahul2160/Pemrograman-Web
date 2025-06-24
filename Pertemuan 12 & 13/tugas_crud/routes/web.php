<?php

// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk CRUD Sinkronus
Route::resource('products', ProductController::class);