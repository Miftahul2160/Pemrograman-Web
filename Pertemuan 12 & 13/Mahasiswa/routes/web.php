<?php

use Illuminate\Support\Facades\Route;
// Tambahkan
use App\Http\Controllers\MahasiswaController;

Route::resource('mahasiswa', MahasiswaController::class)->except(['show']); // Route ‘/mahasiswa’
Route::get('/mahasiswa/get-data', [MahasiswaController::class, 'getData'])->name('mahasiswa.get-data'); // Route JSON ‘/mahasiswa/get-data’


Route::get('/', function () {
    return view('welcome');
});
