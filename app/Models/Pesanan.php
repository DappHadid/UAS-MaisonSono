<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $fillable = [
        'pelanggan_id',
        'tanggal_pesanan',
        'total_harga_produk',
        'status',
        'rating',
        'ulasan',
    ];

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tanggal_pesanan' => 'datetime',
    ];

    // Relasi ke Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    // Relasi ke Produk melalui tabel pivot
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'pesanan_produk', 'pesanan_id', 'produk_id')
            ->withPivot('jumlah', 'harga_saat_pesan');
    }

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanans_id');
    }
}
