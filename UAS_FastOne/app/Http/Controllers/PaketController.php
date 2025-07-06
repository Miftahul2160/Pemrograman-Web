<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->get();
        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pakets',
            'harga' => 'required|string|max:255',
            'gambar' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fitur' => 'required|string',
        ]);

        Paket::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->slug),
            'harga' => $request->harga,
            'gambar' => $request->gambar,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'fitur' => explode("\n", $request->fitur), // Ubah string menjadi array
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function show($slug)
    {
        $paket = Paket::where('slug', $slug)->firstOrFail();
        return view('paket.show', compact('paket'));
    }
    
    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pakets,slug,' . $paket->id,
            'harga' => 'required|string|max:255',
            'gambar' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fitur' => 'required|string',
        ]);

        $paket->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->slug),
            'harga' => $request->harga,
            'gambar' => $request->gambar,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'fitur' => explode("\n", $request->fitur),
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
