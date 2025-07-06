<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PermintaanLayananController;

Route::get('/', function () {
    // Jika sudah login, arahkan ke dashboard yang sesuai.
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('akun.saya');
        }
    }
    // Jika belum login, arahkan ke halaman marketing publik.
    return redirect()->route('home');
});

// FIX: Rute untuk halaman marketing publik sekarang bernama 'home'
Route::get('/beranda', [PageController::class, 'home'])->name('home');
Route::get('/layanan/{layanan:slug}', [LayananController::class, 'show'])->name('layanan.show');
Route::get('/paket/{slug}', [PaketController::class, 'show'])->name('paket.show');

Route::middleware(['auth', 'verified'])->group(function () {

    // Halaman dashboard untuk pelanggan
    Route::get('/akun-saya', [PageController::class, 'akunSaya'])->name('akun.saya');

    // Rute yang HANYA bisa diakses oleh ADMIN
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // Rute CRUD untuk Paket (tanpa 'show' karena sudah ada di rute publik)
        Route::resource('paket', PaketController::class)->except(['show']);

        // Rute CRUD untuk Pelanggan
        Route::resource('pelanggan', PelangganController::class);

        Route::resource('admin/layanan', LayananController::class)->except(['show', 'create', 'destroy']);
        Route::resource('admin/permintaan', PermintaanLayananController::class)->except(['create', 'store', 'show']);
    });

    Route::get('/langganan/{paket_id}', [App\Http\Controllers\PelangganController::class, 'showSubscriptionForm'])->name('pelanggan.subscribe.form');
    Route::post('/langganan', [App\Http\Controllers\PelangganController::class, 'processSubscription'])->name('pelanggan.subscribe.process');
    Route::post('/permintaan-layanan', [PermintaanLayananController::class, 'store'])->name('permintaan.store');

    // Rute untuk mengelola profil, bisa diakses oleh semua pengguna yang login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
