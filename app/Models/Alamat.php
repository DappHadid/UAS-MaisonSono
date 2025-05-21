<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';

    protected $fillable = [
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'patokan',
    ];

    public $timestamps = false;

    // Relasi ke Pelanggan
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
