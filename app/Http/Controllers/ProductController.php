<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang'        => 'required|unique:products,kode_barang',
            'nama_barang'        => 'required|string|max:255',
            'satuan'             => 'nullable|string|max:50',
            'kategori'           => 'nullable|string|max:100',
            'harga_beli'         => 'nullable|numeric',
            'harga_jual'         => 'nullable|numeric',
            'stok_awal'          => 'required|integer|min:0',
            'batas_stok_minimal' => 'required|integer|min:0',
        ]);

        // stok_saat_ini awalnya sama dengan stok_awal
        $validated['stok_saat_ini'] = $validated['stok_awal'];

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }
}
