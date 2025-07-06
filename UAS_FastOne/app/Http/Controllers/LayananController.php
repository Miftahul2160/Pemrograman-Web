<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // Menampilkan daftar layanan di panel admin
    public function index()
    {
        $layanans = Layanan::all();
        return view('admin.layanan.index', compact('layanans'));
    }

    // Menampilkan halaman detail layanan untuk publik
    public function show(Layanan $layanan)
    {
        return view('layanan.show', compact('layanan'));
    }

    // Menampilkan form edit di panel admin
    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    // Memperbarui data layanan dari panel admin
    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'judul_halaman' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'konten_lengkap' => 'required|string',
        ]);

        $layanan->update($validated);

        return redirect()->route('layanan.index')->with('success', 'Konten layanan berhasil diperbarui.');
    }
}
