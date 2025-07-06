<?php

namespace App\Http\Controllers;

use App\Models\PermintaanLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermintaanLayananController extends Controller
{
    /**
     * Menampilkan daftar semua permintaan layanan di panel admin.
     */
    public function index()
    {
        $permintaans = PermintaanLayanan::with(['user', 'layanan'])->latest()->get();
        return view('admin.permintaan.index', compact('permintaans'));
    }

    /**
     * Menyimpan permintaan baru yang dikirim oleh pelanggan.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'telepon_pengguna' => 'required|string|max:20',
            'pesan' => 'nullable|string',
        ]);

        PermintaanLayanan::create([
            'user_id' => Auth::id(),
            'layanan_id' => $validated['layanan_id'],
            'telepon_pengguna' => $validated['telepon_pengguna'],
            'pesan' => $validated['pesan'],
        ]);

        return redirect()->back()->with('success', 'Permintaan Anda telah berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }

    /**
     * Menampilkan halaman untuk memproses/mengedit satu permintaan.
     */
    public function edit(PermintaanLayanan $permintaan)
    {
        return view('admin.permintaan.edit', compact('permintaan'));
    }

    /**
     * Memperbarui status sebuah permintaan.
     */
    public function update(Request $request, PermintaanLayanan $permintaan)
    {
        $validated = $request->validate([
            'status' => 'required|in:Baru,Sudah Dihubungi,Selesai',
        ]);

        $permintaan->update($validated);

        return redirect()->route('permintaan.index')->with('success', 'Status permintaan berhasil diperbarui.');
    }

    /**
     * Menghapus sebuah permintaan.
     */
    public function destroy(PermintaanLayanan $permintaan)
    {
        $permintaan->delete();
        return redirect()->route('permintaan.index')->with('success', 'Permintaan berhasil dihapus.');
    }
}
