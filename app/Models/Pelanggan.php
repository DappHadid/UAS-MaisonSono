<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $fillable = [
        'alamat_id',
        'username',
        'password',
        'nama',
        'email',
        'no_hp',
    ];

    public $timestamps = false;

    // Relasi ke Alamat
    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    // Relasi ke Pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
