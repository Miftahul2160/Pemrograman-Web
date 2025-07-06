<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique(); // ID unik untuk URL, cth: 'paket-basic'
            $table->string('harga');
            $table->string('gambar');
            $table->string('judul');
            $table->text('deskripsi');
            $table->json('fitur'); // Menyimpan daftar fitur sebagai JSON
            $table->timestamps(); // Otomatis membuat kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
