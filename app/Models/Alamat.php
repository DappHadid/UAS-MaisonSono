<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alamat extends Model
{
    use HasFactory;
    protected $fillable = [
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'catatan',
        'pelanggans_id',
    ];

        // Relasi ke Pelanggan
        public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggans_id');
    }
}