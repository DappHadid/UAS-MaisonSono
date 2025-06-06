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
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanans_id')      
                ->constrained('pesanans')                
                ->onDelete('cascade');
            $table->foreignId('produks_id')      
                ->constrained('produks')                
                ->onDelete('cascade');
            $table->integer('kuantitas_produk')->default(0);
            $table->decimal('harga', 12, 2)->nullable();
            $table->decimal('total_harga', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanans');
    }
};
