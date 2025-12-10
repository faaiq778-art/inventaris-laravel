<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Product Inventory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: radial-gradient(circle at top left, #e0f2fe, #eef2ff 40%, #f8fafc 80%);
        }
        main {
            flex: 1;
        }
        .hero-title {
            font-size: 2.6rem;
            font-weight: 800;
            letter-spacing: 0.02em;
        }
        .hero-subtitle {
            font-size: 1rem;
        }
        .hero-card {
            border-radius: 1rem;
        }
        .pill {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.9rem;
            border-radius: 999px;
            font-size: 0.8rem;
            background-color: rgba(37, 99, 235, 0.08);
            color: #1d4ed8;
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('landing') }}">
            Product Inventory
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
            @guest
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                            Sign In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm">
                            Sign Up
                        </a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                           data-bs-toggle="dropdown">
                            <span class="rounded-circle bg-secondary d-inline-flex justify-content-center align-items-center me-2"
                                  style="width: 28px; height: 28px;">
                                <span class="text-white" style="font-size: 0.8rem;">
                                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                                </span>
                            </span>
                            <span style="font-size: 0.9rem;">
                                {{ auth()->user()->email ?? 'user@example.com' }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.index') }}">Kelola Produk</a></li>
                            <li><a class="dropdown-item" href="{{ route('stock-movements.index') }}">Riwayat Stok</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>

<main class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="pill mb-3">
                    Sistem Inventaris • Realtime Monitoring
                </div>

                <h1 class="hero-title mb-3">
                    Pantau stok barang
                    <br>
                    secara cepat dan akurat.
                </h1>

                <p class="hero-subtitle text-muted mb-4">
                    Aplikasi inventaris berbasis web untuk mencatat barang masuk & keluar,
                    memantau stok secara realtime, dan memberikan notifikasi ketika stok
                    menyentuh batas minimal.
                </p>

                <ul class="text-muted mb-4">
                    <li>Pencatatan master data barang yang terpusat.</li>
                    <li>Transaksi stok masuk & keluar dengan riwayat lengkap.</li>
                    <li>Indikator stok minimal di dashboard agar tidak kehabisan barang.</li>
                </ul>

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        Masuk Dashboard
                    </a>
                    <a href="{{ route('stock-movements.index') }}" class="btn btn-outline-secondary">
                        Lihat Riwayat Stok
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm hero-card">
                    <div class="card-header bg-primary text-white">
                        Ringkasan Stok Hari Ini
                    </div>
                    <div class="card-body">
                        <p class="mb-2">• Monitoring stok per barang.</p>
                        <p class="mb-2">• Riwayat transaksi masuk & keluar.</p>
                        <p class="mb-2">• Notifikasi stok minimal.</p>
                        <hr>
                        <p class="mb-0 text-muted" style="font-size: 0.9rem;">
                            Gunakan tombol di atas untuk langsung masuk ke dashboard atau
                            melihat histori stok di gudang.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="py-3 bg-dark text-white-50">
    <div class="container text-center" style="font-size: 0.85rem;">
        © 2025 Product Inventory
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
