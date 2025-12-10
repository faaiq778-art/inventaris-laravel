<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h1 class="mb-4">Dashboard Inventaris</h1>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h6>Total Produk</h6>
                <h2>{{ $totalProducts }}</h2>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h6>Total Stok</h6>
                <h2>{{ $totalStock }}</h2>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h6>Produk Low Stock</h6>
                <h2>{{ $lowStockCount }}</h2>
            </div>
        </div>
    </div>

    <h4>5 Pergerakan Stok Terbaru</h4>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Sumber/Tujuan</th>
        </tr>
        </thead>
        <tbody>
        @forelse($recentMovements as $m)
            <tr>
                <td>{{ $m->tanggal }}</td>
                <td>{{ $m->product->nama_barang ?? '-' }}</td>
                <td>
                    @if($m->tipe === 'IN')
                        <span class="badge bg-success">IN</span>
                    @else
                        <span class="badge bg-danger">OUT</span>
                    @endif
                </td>
                <td>{{ $m->jumlah }}</td>
                <td>{{ $m->sumber }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada transaksi.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('products.index') }}" class="btn btn-outline-primary mt-3">
        Kelola Produk
    </a>
    <a href="{{ route('stock-movements.index') }}" class="btn btn-outline-secondary mt-3">
        Riwayat Stok
    </a>
</div>
</body>
</html>
