<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Menampilkan daftar semua pelanggan (hanya untuk admin).
     */
    public function index()
    {
        // Mengambil semua data pelanggan beserta relasi paketnya
        $pelanggans = Pelanggan::with('paket')->latest()->get();
        return view('pelanggan.index', compact('pelanggans'));
    }

    /**
     * Menampilkan form untuk menambah pelanggan baru (hanya untuk admin).
     */
    public function create()
    {
        // Mengambil semua paket untuk ditampilkan di dropdown
        $pakets = Paket::orderBy('nama')->get();
        return view('pelanggan.create', compact('pakets'));
    }

    /**
     * Menyimpan data pelanggan baru dari form admin.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'paket_id' => 'required|exists:pakets,id',
            'tanggal_bergabung' => 'required|date',
            'status' => 'required|in:Aktif,Tidak Aktif,Menunggu Pemasangan',
        ]);

        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data pelanggan (hanya untuk admin).
     */
    public function edit(Pelanggan $pelanggan)
    {
        $pakets = Paket::orderBy('nama')->get();
        return view('pelanggan.edit', compact('pelanggan', 'pakets'));
    }

    /**
     * Memperbarui data pelanggan dari form admin.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggans,email,' . $pelanggan->id,
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'paket_id' => 'required|exists:pakets,id',
            'tanggal_bergabung' => 'required|date',
            'status' => 'required|in:Aktif,Tidak Aktif,Menunggu Pemasangan',
        ]);

        $pelanggan->update($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    /**
     * Menghapus data pelanggan (hanya untuk admin).
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus.');
    }


    // ===================================================================
    // FUNGSI UNTUK PROSES BERLANGGANAN OLEH PELANGGAN
    // ===================================================================

    /**
     * Menampilkan form untuk pelanggan berlangganan paket.
     */
    public function showSubscriptionForm($paket_id)
    {
        // Cari paket secara manual berdasarkan ID, jika tidak ketemu akan error 404
        $paket = Paket::findOrFail($paket_id);
        $user = Auth::user();

        // Cek apakah pengguna sudah ada di tabel pelanggan
        $existingPelanggan = Pelanggan::where('email', $user->email)->first();

        // Jika sudah ada, alihkan kembali dengan pesan info
        if ($existingPelanggan) {
            return redirect()->route('akun.saya')->with('info', 'Anda sudah memiliki langganan aktif dan tidak dapat berlangganan lagi.');
        }

        // Jika belum, tampilkan form berlangganan
        return view('pelanggan.subscribe', compact('paket'));
    }

    /**
     * Memproses permintaan berlangganan dari pelanggan.
     */
    public function processSubscription(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'paket_id' => 'required|exists:pakets,id',
        ]);

        // Cek lagi untuk mencegah data ganda jika pengguna membuka form di dua tab
        $existingPelanggan = Pelanggan::where('email', $user->email)->first();
        if ($existingPelanggan) {
            return redirect()->route('akun.saya')->with('error', 'Anda sudah terdaftar sebagai pelanggan.');
        }

        // Buat data pelanggan baru
        Pelanggan::create([
            'nama_pelanggan' => $user->name,
            'email' => $user->email,
            'telepon' => $validated['telepon'],
            'alamat' => $validated['alamat'],
            'paket_id' => $validated['paket_id'],
            'tanggal_bergabung' => now(),
            'status' => 'Menunggu Pemasangan',
        ]);

        return redirect()->route('akun.saya')->with('success', 'Permintaan berlangganan Anda telah diterima! Tim kami akan segera menghubungi Anda.');
    }
}
