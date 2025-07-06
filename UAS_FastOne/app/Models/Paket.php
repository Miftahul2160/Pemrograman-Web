<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    // Tentukan kolom mana saja yang boleh diisi secara massal
    protected $fillable = [
        'nama', 'slug', 'harga', 'gambar', 'judul', 'deskripsi', 'fitur'
    ];

    // Otomatis mengubah kolom 'fitur' dari JSON menjadi array (dan sebaliknya)
    protected $casts = [
        'fitur' => 'array'
    ];


    public function pelanggans()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
