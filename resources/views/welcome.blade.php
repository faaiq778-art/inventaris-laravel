@extends('layout.app')

@section('title', 'Product Inventory')

@section('content')
<div id="hero-wrap">
  <section id="hero">
    {{-- TEKS DI POJOK KIRI --}}
    <div class="hero-text">
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
        {{-- wajib login dulu --}}
        <a href="{{ route('login') }}" class="btn-primary-cta">
            Mulai Kelola Stok Sekarang
        </a>

        {{-- wajib login dulu --}}
        <a href="{{ route('login') }}" class="btn-outline-cta">
            Lihat Riwayat Stok
        </a>
      </div>

      <p class="hero-note">
        <strong>5 menit</strong> setup awal • <strong>Tanpa kartu kredit</strong> untuk uji coba
      </p>
    </div>

    {{-- KARTU RINGKASAN STOK --}}
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

<section class="pi-features" id="features">
  <div class="pi-features-inner">
    <div class="pi-feature-col">
      <h3>Inventaris</h3>
      <ul>
        <li>Daftar produk lengkap.</li>
        <li>Stok per gudang.</li>
        <li>Stok minimal & peringatan.</li>
      </ul>
    </div>

    <div class="pi-feature-col">
      <h3>Transaksi</h3>
      <ul>
        <li>Barang masuk & keluar.</li>
        <li>Riwayat pergerakan stok.</li>
      </ul>
    </div>

    <div class="pi-feature-col">
      <h3>Laporan</h3>
      <ul>
        <li>Ringkasan stok harian.</li>
        <li>Laporan penjualan per produk.</li>
      </ul>
    </div>

    <div class="pi-feature-col">
      <h3>Pengaturan</h3>
      <ul>
        <li>Pengguna & hak akses.</li>
        <li>Notifikasi stok menipis.</li>
      </ul>
    </div>
  </div>
</section>
@endsection
