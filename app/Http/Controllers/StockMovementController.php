<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with('product')
            ->orderBy('tanggal', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('stock_movements.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::orderBy('nama_barang')->get();

        return view('stock_movements.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'tipe'       => 'required|in:IN,OUT',
            'jumlah'     => 'required|integer|min:1',
            'tanggal'    => 'required|date',
            'sumber'     => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        // update stok_saat_ini tergantung tipe
        if ($validated['tipe'] === 'IN') {
            $product->stok_saat_ini += $validated['jumlah'];
        } else {
            // OUT: pastikan tidak minus
            if ($product->stok_saat_ini < $validated['jumlah']) {
                return back()
                    ->withErrors(['jumlah' => 'Stok tidak mencukupi untuk pengeluaran ini.'])
                    ->withInput();
            }

            $product->stok_saat_ini -= $validated['jumlah'];
        }

        $product->save();

        StockMovement::create($validated);

        return redirect()->route('stock-movements.index')
            ->with('success', 'Transaksi stok berhasil disimpan.');
    }
}
