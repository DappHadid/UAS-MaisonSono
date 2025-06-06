<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $fillable = [
        'alamats_id',
        'username',
        'password',
        'nama',
        'email',
        'no_hp',
    ];

    /**
     * Relasi ke alamat pelanggan
     */
    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'alamats_id', 'id');
    }

    /**
     * Relasi ke pesanan yang dibuat pelanggan
     */
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'pelanggans_id', 'id');
    }
}
