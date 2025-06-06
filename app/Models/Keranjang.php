<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kuantitas',
        'pelanggans_id',
        'produks_id',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produks_id');
    }
    
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggans_id');
    }
}
