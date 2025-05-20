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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')      
                  ->constrained('pelanggan')                
                  ->onDelete('cascade');
            $table->date('tanggal_pesanan')->nullable();
            $table->decimal('total_harga_produk', 12, 2);
            $table->string('status')->default('diproses');
            $table->decimal('rating', 2, 1)->nullable();
            $table->text('ulasan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
