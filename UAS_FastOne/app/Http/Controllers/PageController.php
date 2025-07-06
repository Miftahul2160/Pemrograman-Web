<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;
use App\Models\PermintaanLayanan;

class PageController extends Controller
{
    /**
     * Menampilkan halaman utama (beranda).
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Menampilkan halaman detail layanan Upgrade & Downgrade.
     */
    public function upgradeDowngrade()
    {
        return view('page.upgrade-downgrade');
    }

    /**
     * Menampilkan halaman "Akun Saya" untuk pelanggan yang sudah login.
     */
     public function akunSaya()
    {
        $user = Auth::user();
        
        $pelanggan = Pelanggan::with('paket')->where('email', $user->email)->first();

        $permintaans = PermintaanLayanan::with('layanan')
                                    ->where('user_id', $user->id)
                                    ->latest() // Urutkan dari yang terbaru
                                    ->get();
        
        return view('akun-saya', compact('user', 'pelanggan', 'permintaans'));
    }
}
