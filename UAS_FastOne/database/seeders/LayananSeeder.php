<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        Layanan::query()->delete();

        Layanan::create([
            'nama' => 'Upgrade & Downgrade Paket',
            'slug' => 'upgrade-downgrade',
            'judul_halaman' => 'Fleksibilitas Upgrade & Downgrade Paket Internet',
            'gambar' => 'upgrade-downgrade-hero.jpg',
            'deskripsi_singkat' => 'Sesuaikan kecepatan internet Anda dengan kebutuhan yang berubah.',
            'konten_lengkap' => 'Di FAST ONE, kami memahami bahwa kebutuhan internet Anda dapat berubah seiring waktu. Layanan upgrade dan downgrade paket kami dirancang untuk memberikan Anda fleksibilitas maksimal.',
        ]);

        Layanan::create([
            'nama' => 'Konsultasi Pemasangan Wifi',
            'slug' => 'konsultasi-pemasangan',
            'judul_halaman' => 'Konsultasikan Pemasangan Wifi Anda',
            'gambar' => 'konsultasi-pemasangan-hero.jpg',
            'deskripsi_singkat' => 'Rencanakan pemasangan jaringan WiFi yang optimal dari tahap awal.',
            'konten_lengkap' => 'Merencanakan pemasangan jaringan WiFi yang optimal bisa menjadi tantangan. Layanan konsultasi kami membantu Anda dari tahap perencanaan hingga implementasi, memastikan Anda mendapatkan solusi jaringan nirkabel yang handal, aman, dan sesuai kebutuhan.',
        ]);

        Layanan::create([
            'nama' => 'Konsultasi Troubleshooting Wifi',
            'slug' => 'konsultasi-troubleshooting',
            'judul_halaman' => 'Atasi Masalah Jaringan WiFi Anda',
            'gambar' => 'konsultasi-troubleshooting-hero.jpg',
            'deskripsi_singkat' => 'Jaringan WiFi lambat, sering putus, atau tidak menjangkau seluruh area?',
            'konten_lengkap' => 'Masalah jaringan bisa sangat mengganggu produktivitas dan kenyamanan. Layanan konsultasi troubleshooting WiFi kami hadir untuk mendiagnosis akar masalah dan memberikan solusi efektif agar jaringan Anda kembali optimal.',
        ]);
    }
}
