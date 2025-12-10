<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Product Inventory')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('landing') }}">
            Product Inventory
        </a>

        <div class="d-flex">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm me-2">Dashboard</a>
            <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm me-2">Produk</a>
            <a href="{{ route('stock-movements.index') }}" class="btn btn-outline-light btn-sm">Riwayat Stok</a>
        </div>
    </div>
</nav>

<div class="container mb-4">
    @yield('content')
</div>

<footer class="py-3 bg-dark text-white-50">
    <div class="container text-center" style="font-size: 0.85rem;">
        © 2025 Product Inventory
    </div>
</footer>

</body>
</html>
