<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    private function getKonsultasiData()
    {
        return [
            'pemasangan' => [
                'nama' => 'Konsultasi Pemasangan Wifi',
                'harga' => 'Rp 500.000 <small class="text-muted fs-5">/Sesi</small>',
                'gambar' => 'konsultasi-pemasangan-hero.jpg',
                'judul' => 'Konsultasikan Pemasangan Wifi Anda',
                'deskripsi' => 'Merencanakan pemasangan jaringan WiFi yang optimal bisa menjadi tantangan. Layanan kami membantu Anda dari tahap perencanaan hingga implementasi untuk memastikan Anda mendapatkan solusi nirkabel yang handal, aman, dan sesuai kebutuhan.',
                'fitur' => [
                    '<strong>Analisis Kebutuhan Mendalam:</strong> Kami akan menggali kebutuhan spesifik Anda.',
                    '<strong>Include Perangkat Acces-Point:</strong> Termasuk bundle Access Point (AP) yang sesuai.',
                    '<strong>Desain Topologi Jaringan:</strong> Perencanaan tata letak router/AP untuk cakupan sinyal maksimal.',
                    '<strong>Rekomendasi ISP:</strong> Solusi penyedia layanan internet (ISP) terbaik di lokasi Anda.',
                    '<strong>Edukasi Jaringan:</strong> Penjelasan dasar mengenai cara kerja WiFi dan troubleshooting sederhana.',
                    '<strong>Laporan Rekomendasi Tertulis:</strong> Anda akan menerima dokumen berisi semua analisis dan rekomendasi.',
                ],
                'proses' => [
                    ['judul' => 'Sesi Awal (Discovery)', 'deskripsi' => 'Diskusi mendalam untuk memahami kebutuhan, ekspektasi, dan anggaran Anda.'],
                    ['judul' => 'Survei Lokasi (Opsional)', 'deskripsi' => 'Pengecekan langsung di lokasi untuk analisis yang lebih akurat.'],
                    ['judul' => 'Analisis & Perancangan', 'deskripsi' => 'Tim kami menganalisis data dan merancang solusi jaringan yang paling efektif.'],
                    ['judul' => 'Presentasi Rekomendasi', 'deskripsi' => 'Kami akan mempresentasikan hasil analisis dan rekomendasi solusi kepada Anda.'],
                ],
                'cta_judul' => 'Siap Merancang Jaringan Optimal Anda?',
            ],
            'troubleshooting' => [
                'nama' => 'Konsultasi Troubleshooting Wifi',
                'harga' => 'Rp 750.000 <small class="text-muted fs-5">/Sesi</small>',
                'gambar' => 'konsultasi-troubleshooting-hero.jpg',
                'judul' => 'Atasi Masalah Jaringan WiFi Anda',
                'deskripsi' => 'Jaringan WiFi lambat, sering putus, atau tidak menjangkau seluruh area? Layanan kami hadir untuk mendiagnosis akar masalah dan memberikan solusi efektif agar jaringan Anda kembali optimal.',
                'fitur' => [
                    '<strong>Diagnosa Akurat oleh Ahli:</strong> Analisis menyeluruh terhadap konfigurasi, perangkat, dan interferensi.',
                    '<strong>Penyelesaian Dead-Zones:</strong> Identifikasi penyebab area tanpa sinyal dan solusinya.',
                    '<strong>Optimalisasi Kecepatan:</strong> Penyesuaian konfigurasi untuk meningkatkan performa jaringan.',
                    '<strong>Konfigurasi Keamanan Lanjutan:</strong> Review dan penguatan keamanan jaringan Anda.',
                    '<strong>Include Mikrotik Controller:</strong> Penambahan controller untuk manajemen jaringan yang lebih canggih.',
                    '<strong>Jaminan Masalah Teratasi:</strong> Komitmen kami untuk menyelesaikan masalah jaringan Anda.',
                ],
                'proses' => [
                    ['judul' => 'Sesi Awal & Pengumpulan Info', 'deskripsi' => 'Diskusi mengenai gejala masalah, riwayat jaringan, dan perangkat yang digunakan.'],
                    ['judul' => 'Diagnosa On-Site/Remote', 'deskripsi' => 'Teknisi kami akan melakukan pengecekan langsung atau melalui akses remote.'],
                    ['judul' => 'Identifikasi Akar Masalah', 'deskripsi' => 'Menggunakan tools dan keahlian untuk menemukan sumber utama masalah.'],
                    ['judul' => 'Implementasi Solusi', 'deskripsi' => 'Melakukan perbaikan langsung dan memberikan rekomendasi perbaikan lanjutan jika perlu.'],
                ],
                'cta_judul' => 'Atasi Masalah Jaringan WiFi Anda Sekarang!',
            ],
        ];
    }

    public function show($slug)
    {
        $allKonsultasi = $this->getKonsultasiData();

        if (!array_key_exists($slug, $allKonsultasi)) {
            abort(404);
        }

        $konsultasi = $allKonsultasi[$slug];

        return view('konsultasi.show', compact('konsultasi'));
    }
}
