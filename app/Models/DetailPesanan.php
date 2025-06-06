<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kuantitas_produk',
        'harga',
        'total_harga',
        'pesanans_id',
        'produks_id',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produks_id');
    }
    
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanans_id');
    }
}
