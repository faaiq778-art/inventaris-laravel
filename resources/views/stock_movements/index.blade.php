<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pergerakan Stok</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h1>Riwayat Pergerakan Stok</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('stock-movements.create') }}" class="btn btn-primary mb-3">+ Transaksi Baru</a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">← Kembali ke Produk</a>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Sumber/Tujuan</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        @forelse($movements as $m)
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
                <td>{{ $m->keterangan }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada transaksi stok.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
