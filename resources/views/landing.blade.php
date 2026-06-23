<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Produk Inventory</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    :root {
      --primary: #2563eb;   /* biru utama */
      --primary-dark: #1d4ed8;
      --bg: #0f172a;
      --text-main: #0f172a;
      --text-muted: #64748b;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      color: var(--text-main);
      background: #f8fafc;
      line-height: 1.5;
    }

    .container {
      width: 100%;
      max-width: 1120px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }

    header {
      position: sticky;
      top: 0;
      z-index: 20;
      backdrop-filter: blur(16px);
      background: rgba(15, 23, 42, 0.9);
      color: #e5e7eb;
      border-bottom: 1px solid rgba(148, 163, 184, 0.3);
    }

    header .inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.85rem 0;
    }

    .logo {
      font-weight: 700;
      letter-spacing: 0.03em;
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    .logo-dot {
      width: 10px;
      height: 10px;
      border-radius: 999px;
      background: #22c55e;
    }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 0.6rem 1.2rem;
      border-radius: 999px;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      border: 1px solid transparent;
      text-decoration: none;
      transition: all 0.18s ease-out;
      white-space: nowrap;
    }

    .btn-primary-cta {
      background: var(--primary);
      color: #f9fafb;
      box-shadow: 0 14px 30px rgba(37, 99, 235, 0.33);
    }

    .btn-primary-cta:hover {
      background: var(--primary-dark);
      transform: translateY(-1px);
      box-shadow: 0 18px 40px rgba(37, 99, 235, 0.45);
    }

    .btn-outline-cta {
      background: transparent;
      color: #e5e7eb;
      border-color: rgba(148, 163, 184, 0.7);
    }

    .btn-outline-cta:hover {
      background: rgba(15, 23, 42, 0.9);
      border-color: #e5e7eb;
    }

    .btn-ghost {
      background: transparent;
      color: #e5e7eb;
      border-color: transparent;
      padding-inline: 0.4rem;
    }

    .btn-ghost:hover {
      color: #ffffff;
      text-decoration: underline;
    }

    /* HERO */
    #hero-wrap {
      background: radial-gradient(circle at top left, #1d4ed8 0, #0f172a 52%, #020617 100%);
      color: #e5e7eb;
      padding: 3rem 0 4rem;
    }

    #hero {
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr);
      gap: 2.75rem;
      align-items: center;
    }

    .hero-kicker {
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
      border-radius: 999px;
      border: 1px solid rgba(148, 163, 184, 0.5);
      padding: 0.2rem 0.7rem 0.2rem 0.3rem;
      font-size: 0.75rem;
      color: #cbd5f5;
      margin-bottom: 1.2rem;
      background: rgba(15, 23, 42, 0.6);
    }

    .hero-kicker span {
      border-radius: 999px;
      padding: 0.1rem 0.6rem;
      background: rgba(15, 23, 42, 0.9);
    }

    .hero-title {
      font-size: clamp(2.3rem, 5vw, 3.1rem);
      font-weight: 800;
      letter-spacing: -0.03em;
      margin-bottom: 0.85rem;
    }

    .hero-subtitle {
      font-size: 0.98rem;
      max-width: 30rem;
      color: #cbd5f5;
      margin-bottom: 1.6rem;
    }

    .hero-ctas {
      display: flex;
      flex-wrap: wrap;
      gap: 0.85rem;
      margin-bottom: 1.5rem;
    }

    .hero-metas {
      display: flex;
      flex-wrap: wrap;
      gap: 1.1rem;
      font-size: 0.78rem;
      color: #9ca3af;
    }

    .hero-metas strong {
      color: #e5e7eb;
    }

    .hero-card {
      background: rgba(15, 23, 42, 0.92);
      border-radius: 1.4rem;
      padding: 1.4rem 1.2rem;
      border: 1px solid rgba(148, 163, 184, 0.4);
      box-shadow: 0 24px 80px rgba(15, 23, 42, 0.9);
    }

    .hero-card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1rem;
      font-size: 0.8rem;
      color: #9ca3af;
    }

    .badge-live {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.15rem 0.55rem;
      border-radius: 999px;
      background: rgba(22, 163, 74, 0.14);
      color: #bbf7d0;
      font-size: 0.72rem;
      border: 1px solid rgba(34, 197, 94, 0.35);
    }

    .dot-live {
      width: 7px;
      height: 7px;
      border-radius: 999px;
      background: #22c55e;
      box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.35);
    }

    .hero-metric-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 0.8rem;
      font-size: 0.8rem;
      color: #cbd5f5;
    }

    .metric {
      padding: 0.5rem 0.6rem;
      border-radius: 0.9rem;
      background: rgba(15, 23, 42, 0.75);
      border: 1px solid rgba(51, 65, 85, 0.8);
    }

    .metric-label {
      font-size: 0.7rem;
      color: #9ca3af;
      margin-bottom: 0.12rem;
    }

    .metric-value {
      font-weight: 600;
    }

    @media (max-width: 768px) {
      header .inner { padding-inline: 0.4rem; }
      #hero {
        grid-template-columns: minmax(0, 1fr);
        gap: 2rem;
      }
      .hero-card {
        order: -1;
      }
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="container inner">
      <div class="logo">
        <div class="logo-dot"></div>
        <span>Produk Inventory</span>
      </div>
      <div class="nav-actions">
        <button class="btn btn-ghost">Docs</button>
        <button class="btn btn-outline-cta">Login</button>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <div id="hero-wrap">
    <div class="container">
      <section id="hero">
        <div>
          <div class="hero-kicker">
            <span>Baru</span>
            <p>Dashboard stok rapi untuk bisnis berkembang</p>
          </div>

          <h1 class="hero-title">
            Kelola stok tanpa spreadsheet yang bikin pusing.
          </h1>

          <p class="hero-subtitle">
            Produk Inventory membantu mencatat stok, pesanan, dan laporan penjualan
            dalam satu tampilan yang rapi dan mudah dipahami tim.
          </p>

          <div class="hero-ctas">
            <a href="#pricing" class="btn btn-primary-cta">
              Mulai Kelola Stok Sekarang
            </a>
            <a href="#demo" class="btn btn-outline-cta">
              Lihat Demo Dashboard
            </a>
          </div>

          <div class="hero-metas">
            <span><strong>5 menit</strong> setup awal</span>
            <span><strong>Tanpa kartu kredit</strong> untuk uji coba</span>
          </div>
        </div>

        <aside class="hero-card">
          <div class="hero-card-header">
            <span>Ringkasan Stok Hari Ini</span>
            <span class="badge-live">
              <span class="dot-live"></span>
              Live update
            </span>
          </div>

          <div class="hero-metric-grid">
            <div class="metric">
              <div class="metric-label">Produk aktif</div>
              <div class="metric-value">128 item</div>
            </div>
            <div class="metric">
              <div class="metric-label">Akan habis</div>
              <div class="metric-value">9 item</div>
            </div>
            <div class="metric">
              <div class="metric-label">Pesanan hari ini</div>
              <div class="metric-value">32 transaksi</div>
            </div>
            <div class="metric">
              <div class="metric-label">Nilai stok</div>
              <div class="metric-value">Rp 87.500.000</div>
            </div>
          </div>
        </aside>
      </section>
    </div>
  </div>

  <!-- Nanti di bawah sini tinggal kamu tambahkan section Features, How it works, Pricing, dll -->

</body>
</html>
