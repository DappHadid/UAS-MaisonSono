<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
        protected $fillable = [

        'nama_produk',
        'deskripsi',
        'size',
        'harga',
        'diskon',
        'gambar',
        'stok',
    ];

    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class, 'produks_id');
    }

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class, 'produks_id');
    }

}
