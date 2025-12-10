<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Stok</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h1>Transaksi Stok (Masuk / Keluar)</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stock-movements.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Produk</label>
            <select name="product_id" class="form-select" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $p)
                    <option value="{{ $p->id }}">{{ $p->kode_barang }} - {{ $p->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe</label>
            <select name="tipe" class="form-select" required>
                <option value="IN">IN (Barang Masuk)</option>
                <option value="OUT">OUT (Barang Keluar)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sumber / Tujuan</label>
            <input type="text" name="sumber" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('stock-movements.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
