<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'detail_pesanan';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'kuantitas_produk',
        'harga',
        'total_harga',
    ];

    // Jika Anda ingin menonaktifkan timestamps (karena migration tidak ada kolom created_at/updated_at)
    public $timestamps = false;

    /**
     * Relasi ke model Pesanan
     */
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    /**
     * Relasi ke model Produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
