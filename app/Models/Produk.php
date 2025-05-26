<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'size',
        'harga',
        'diskon',
        'gambar',
        'stok',
    ];

    public $timestamps = false;

    // Relasi ke Pesanan jika kamu punya tabel pivot (misalnya pesanan_produk)
    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class, 'pesanan_produk', 'produk_id', 'pesanan_id')
                    ->withPivot('jumlah', 'harga_saat_pesan');
    }
}