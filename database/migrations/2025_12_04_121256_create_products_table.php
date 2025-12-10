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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('kode_barang')->unique();
        $table->string('nama_barang');
        $table->string('satuan')->nullable();
        $table->string('kategori')->nullable();
        $table->decimal('harga_beli', 15, 2)->nullable();
        $table->decimal('harga_jual', 15, 2)->nullable();
        $table->integer('stok_awal')->default(0);
        $table->integer('stok_saat_ini')->default(0);
        $table->integer('batas_stok_minimal')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
