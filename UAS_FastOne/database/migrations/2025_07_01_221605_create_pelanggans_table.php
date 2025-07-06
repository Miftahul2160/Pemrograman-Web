<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->text('alamat');
            
            // Kolom untuk Foreign Key ke tabel 'pakets'
            $table->foreignId('paket_id')->constrained('pakets')->onDelete('cascade');
            
            $table->date('tanggal_bergabung');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Menunggu Pemasangan'])->default('Menunggu Pemasangan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
