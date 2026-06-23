<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Product Inventory')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <style>
    :root { --primary:#2563eb; --primary-dark:#1d4ed8; --text-main:#0f172a; }

    body {
      font-family: system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
      color: var(--text-main);
      background:#f8fafc;
      line-height:1.5;
    }

    /* HERO */
    #hero-wrap {
      background:radial-gradient(circle at top left,#1d4ed8 0,#0f172a 52%,#020617 100%);
      color:#e5e7eb;
      min-height: calc(100vh - 64px);
      display:flex;
      align-items:center;
      padding:3rem 0 4rem;
    }

    #hero {
      display:grid;
      grid-template-columns:minmax(0,1.1fr) minmax(0,1fr);
      gap:2.75rem;
      align-items:center;
      max-width:1120px;
      margin:0 auto;
      padding:0 1.5rem;
    }

    .hero-kicker {
      display:inline-flex;
      align-items:center;
      gap:.6rem;
      border-radius:999px;
      border:1px solid rgba(148,163,184,.5);
      padding:.35rem .9rem .4rem .4rem;
      font-size:.78rem;
      color:#cbd5f5;
      margin-bottom:1.4rem;
      background:rgba(15,23,42,.6);
    }
    .hero-kicker span {
      border-radius:999px;
      padding:.18rem .7rem .22rem;
      background:rgba(15,23,42,.9);
    }

    .hero-title {
      font-size:clamp(2.3rem,5vw,3.1rem);
      font-weight:800;
      letter-spacing:-.03em;
      margin-bottom:.85rem;
    }

    .hero-subtitle {
      font-size:.98rem;
      max-width:30rem;
      color:#cbd5f5;
      margin-bottom:1.6rem;
    }

    .hero-ctas {
      display:flex;
      flex-wrap:wrap;
      gap:.85rem;
      margin-bottom:1.5rem;
    }

    .btn-primary-cta,
    .btn-outline-cta {
      display:inline-flex;
      align-items:center;
      justify-content:center;
      padding:.6rem 1.6rem;
      border-radius:999px;
      font-size:.9rem;
      font-weight:600;
      cursor:pointer;
      border:1px solid transparent;
      text-decoration:none;
      transition:all .18s ease-out;
      white-space:nowrap;
    }

    .btn-primary-cta {
      background:var(--primary);
      color:#f9fafb;
      box-shadow:0 14px 30px rgba(37,99,235,.33);
    }
    .btn-primary-cta:hover {
      background:var(--primary-dark);
      transform:translateY(-1px);
      box-shadow:0 18px 40px rgba(37,99,235,.45);
    }

    .btn-outline-cta {
      background:transparent;
      color:#e5e7eb;
      border-color:rgba(148,163,184,.7);
    }
    .btn-outline-cta:hover {
      background:rgba(15,23,42,.9);
      border-color:#e5e7eb;
    }

    .hero-card {
      background:rgba(15,23,42,.92);
      border-radius:1.4rem;
      padding:1.4rem 1.2rem;
      border:1px solid rgba(148,163,184,.4);
      box-shadow:0 24px 80px rgba(15,23,42,.9);
    }

    .hero-card-header {
      display:flex;
      align-items:center;
      justify-content:space-between;
      margin-bottom:1rem;
      font-size:.8rem;
      color:#9ca3af;
    }

    .badge-live {
      display:inline-flex;
      align-items:center;
      gap:.4rem;
      padding:.15rem .55rem;
      border-radius:999px;
      background:rgba(22,163,74,.14);
      color:#bbf7d0;
      font-size:.72rem;
      border:1px solid rgba(34,197,94,.35);
    }

    .dot-live {
      width:7px;height:7px;border-radius:999px;
      background:#22c55e;
      box-shadow:0 0 0 4px rgba(34,197,94,.35);
    }

    .hero-metric-grid {
      display:grid;
      grid-template-columns:repeat(2,minmax(0,1fr));
      gap:.8rem;
      font-size:.8rem;
      color:#cbd5f5;
    }

    .metric {
      padding:.5rem .6rem;
      border-radius:.9rem;
      background:rgba(15,23,42,.75);
      border:1px solid rgba(51,65,85,.8);
    }

    .metric-label {font-size:.7rem;color:#9ca3af;margin-bottom:.12rem;}
    .metric-value {font-weight:600;}

    @media (max-width:768px){
      #hero {grid-template-columns:minmax(0,1fr);gap:2rem;}
      .hero-card {order:-1;}
    }

    /* NAVBAR + MEGA MENU */
    .pi-nav {
      border-bottom: 1px solid #e5e7eb;
      background: #ffffff;
      position: sticky;
      top: 0;
      z-index: 40;
    }

    .pi-nav-inner {
      max-width: 1120px;
      margin: 0 auto;
      padding: 0.7rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .pi-logo {
      font-weight: 700;
      letter-spacing: 0.03em;
    }

    .pi-logo a {
      text-decoration: none;
      color: #111827;
    }

    .pi-nav-links {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      font-size: 0.9rem;
    }

    .pi-nav-link {
      text-decoration: none;
      color: #4b5563;
    }

    .pi-nav-link:hover {
      color: #111827;
    }

    .pi-nav-item {
      position: relative;
    }

    .pi-nav-btn {
      border: none;
      background: none;
      font: inherit;
      color: #4b5563;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 0.15rem;
    }

    .pi-nav-btn:hover {
      color: #111827;
    }

    .pi-nav-caret {
      font-size: 0.7rem;
    }

    .pi-nav-actions {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-left: 1.5rem;
    }

    .pi-nav-ghost {
      font-size: 0.88rem;
      color: #4b5563;
      text-decoration: none;
    }

    .pi-nav-ghost:hover {
      color: #111827;
    }

    .pi-nav-cta {
      padding: 0.45rem 1.2rem;
      border-radius: 999px;
      background: #7c3aed;
      color: #f9fafb;
      font-size: 0.86rem;
      font-weight: 600;
      text-decoration: none;
    }

    .pi-nav-cta:hover {
      background: #6d28d9;
    }

    .pi-mega {
      position: absolute;
      left: 0;
      top: 120%;
      width: 720px;
      max-width: 80vw;
      background: #ffffff;
      border-radius: 0.75rem;
      border: 1px solid #e5e7eb;
      box-shadow: 0 18px 45px rgba(15, 23, 42, 0.18);
      padding: 1.6rem 1.8rem 1.8rem;
      opacity: 0;
      visibility: hidden;
      transform: translateY(8px);
      transition: all 0.16s ease-out;
      z-index: 50;
    }

    .pi-has-mega:hover .pi-mega {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .pi-mega-inner {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 2rem;
      font-size: 0.88rem;
    }

    .pi-mega-col h3 {
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.09em;
      color: #6b7280;
      margin-bottom: 0.7rem;
      border-bottom: 2px solid #e5e7eb;
      padding-bottom: 0.35rem;
    }

    .pi-mega-col ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .pi-mega-col li {
      padding: 0.22rem 0;
    }

    .pi-mega-col li a {
      color: #4b5563;
      text-decoration: none;
    }

    .pi-mega-col li a:hover {
      color: #2563eb;
    }

    /* SECTION FITUR DI BAWAH HERO */
    .pi-features {
      border-top: 1px solid #e5e7eb;
      background: #f9fafb;
    }

    .pi-features-inner {
      max-width: 1120px;
      margin: 0 auto;
      padding: 2.8rem 1.5rem 3.2rem;
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 2.8rem;
      font-size: 0.92rem;
    }

    .pi-feature-col h3 {
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: #4b5563;
      margin-bottom: 0.9rem;
      border-bottom: 2px solid #e5e7eb;
      padding-bottom: 0.4rem;
    }

    .pi-feature-col ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .pi-feature-col li {
      padding: 0.22rem 0;
      color: #4b5563;
    }

    .pi-feature-col li:hover {
      color: #2563eb;
    }

    @media (max-width: 1024px) {
      .pi-features-inner {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 640px) {
      .pi-features-inner {
        grid-template-columns: minmax(0, 1fr);
      }
    }
  </style>
</head>

<body class="bg-light">

  <!-- NAVBAR BARU -->
  <header class="pi-nav">
    <div class="pi-nav-inner">
      <div class="pi-logo">
        <a href="{{ route('landing') }}">Product Inventory</a>
      </div>

      <nav class="pi-nav-links">
        <div class="pi-nav-item pi-has-mega">
          <button class="pi-nav-btn" type="button">
            Inventory
            <span class="pi-nav-caret">▾</span>
          </button>

          <div class="pi-mega">
            <div class="pi-mega-inner">
              <div class="pi-mega-col">
                <h3>Inventaris</h3>
                <ul>
                  <li><a href="{{ route('products.index') }}">Daftar Produk</a></li>
                  <li><a href="{{ route('dashboard') }}">Ringkasan Stok</a></li>
                </ul>
              </div>
              <div class="pi-mega-col">
                <h3>Transaksi</h3>
                <ul>
                  <li><a href="{{ route('stock-movements.index') }}">Pergerakan Stok</a></li>
                </ul>
              </div>
              <div class="pi-mega-col">
                <h3>Laporan</h3>
                <ul>
                  <li><a href="{{ route('dashboard') }}">Laporan Dashboard</a></li>
                </ul>
              </div>
              <div class="pi-mega-col">
                <h3>Pengaturan</h3>
                <ul>
                  <li><a href="#">Pengguna</a></li>
                  <li><a href="#">Notifikasi</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Overview balik ke landing -->
        <a href="{{ route('landing') }}" class="pi-nav-link">Overview</a>

        <!-- Scroll ke section fitur -->
        <a href="#features" class="pi-nav-link">Features</a>
      </nav>

      <!-- AKSI KANAN: tampilkan username kalau sudah login -->
      <div class="pi-nav-actions">
        @auth
          <span style="font-size:0.9rem;color:#4b5563;">
            Halo, {{ Auth::user()->name }}
          </span>
          <form action="{{ route('logout') }}" method="POST" style="margin:0;">
            @csrf
            <button type="submit" class="pi-nav-ghost" style="border:none;background:none;cursor:pointer;">
              Logout
            </button>
          </form>
        @else
          <a href="{{ route('login') }}" class="pi-nav-ghost">Sign in</a>
          <a href="{{ route('login') }}" class="pi-nav-cta">Try it free</a>
        @endauth
      </div>
    </div>
  </header>

  <!-- KONTEN HALAMAN -->
  <main>
      @yield('content')
  </main>

  <footer class="py-3 bg-dark text-white-50 mt-4">
      <div class="container text-center" style="font-size: 0.85rem;">
          © 2025 Product Inventory
      </div>
  </footer>

</body>
</html>
