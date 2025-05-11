<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->date('tanggal_pesanan')->nullable();
            $table->boolean('total_harga_produk')->default(false);
            $table->string('status')->default('diproses');
            $table->boolean('rating')->default(false);
            $table->text('ulasan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropColumn(['status', 'alamat_pengiriman', 'tanggal_pengiriman', 'dibayar']);
        });
    }
};
