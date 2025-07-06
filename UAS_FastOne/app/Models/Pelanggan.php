<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Tentukan kolom yang boleh diisi
    protected $fillable = [
        'nama_pelanggan',
        'email',
        'telepon',
        'alamat',
        'paket_id',
        'tanggal_bergabung',
        'status',
    ];

    /**
     * Mendefinisikan relasi "belongsTo".
     * Setiap pelanggan PASTI memiliki satu paket.
     */
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
