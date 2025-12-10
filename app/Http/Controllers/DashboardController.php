<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalStock    = Product::sum('stok_saat_ini');

        $lowStockCount = Product::whereColumn(
            'stok_saat_ini',
            '<=',
            'batas_stok_minimal'
        )->count();

        $recentMovements = StockMovement::with('product')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalStock',
            'lowStockCount',
            'recentMovements'
        ));
    }
}
