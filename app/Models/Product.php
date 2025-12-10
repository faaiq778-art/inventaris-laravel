<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'satuan',
        'kategori',
        'harga_beli',
        'harga_jual',
        'stok_awal',
        'stok_saat_ini',
        'batas_stok_minimal',
    ];
}
