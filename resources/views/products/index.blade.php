<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h1>Daftar Produk</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Tambah Produk
        </a>

        <a href="{{ route('stock-movements.index') }}" class="btn btn-outline-secondary">
            Riwayat Stok
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Stok Saat Ini</th>
            <th>Batas Stok Minimal</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->kode_barang }}</td>
                <td>{{ $product->nama_barang }}</td>
                <td>{{ $product->kategori }}</td>
                <td>
                    @if($product->stok_saat_ini <= $product->batas_stok_minimal)
                        <span class="badge bg-danger">
                            {{ $product->stok_saat_ini }} (Low)
                        </span>
                    @else
                        <span class="badge bg-success">
                            {{ $product->stok_saat_ini }}
                        </span>
                    @endif
                </td>
                <td>{{ $product->batas_stok_minimal }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data produk.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
