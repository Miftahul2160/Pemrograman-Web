<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil PaketSeeder yang telah kita buat
        $this->call([
            PaketSeeder::class,
            // Anda bisa menambahkan seeder lain di sini nanti
        ]);

        // Di dalam class DatabaseSeeder, di dalam fungsi run()
        $this->call([
            PaketSeeder::class,
            LayananSeeder::class, // <-- TAMBAHKAN BARIS INI
        ]);
    }
}
