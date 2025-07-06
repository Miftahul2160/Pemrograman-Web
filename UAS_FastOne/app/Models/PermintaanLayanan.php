<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanLayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'layanan_id',
        'telepon_pengguna',
        'pesan',
        'status',
    ];

    // Relasi ke model User (satu permintaan dimiliki oleh satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Layanan (satu permintaan untuk satu layanan)
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
