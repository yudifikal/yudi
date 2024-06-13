<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <style>
    .navbar-brand {
      color: #007bff !important;
    }

    .card-custom {
      padding-top: 80px;
    }

    .card-body {
      display: flex;
      flex-direction: column;
    }

    .card-title {
      font-size: 1.25rem;
      margin-bottom: 0.75rem;
    }

    .card-text {
      margin-bottom: 0.5rem;
    }

    /* Set a fixed height for each card */
    .card {
      height: 100%;
    }

    /* Ensure cards fill the container height */
    .container {
      height: 100%;
    }

    /* Ensure the body fills the viewport */
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    /* Add overflow-y auto to the container to enable scrolling if content exceeds screen height */
    .container {
      overflow-y: auto;
    }
  </style>
  <title>Daftar Pesanan</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; width: 100%; z-index: 1000; top: 0;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CV. BANGUN BERSAMA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboardkonsumen') ? 'active' : '' }}"
              href="/dashboardkonsumen">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('jasakontruksikonsumen') ? 'active' : '' }}"
              href="/jasakontruksikonsumen">Jasa Konstruksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('jasatukangkonsumen') ? 'active' : '' }}" href="/jasatukangkonsumen">Jasa
              Tukang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('materialkonsumen') ? 'active' : '' }}"
              href="/materialkonsumen">Material</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('pesanankonsumen') ? 'active' : '' }}" href="/pesanankonsumen">Pesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid mt-5 pt-4">
    <h2>Daftar Pesanan</h2>

    <h3>Pesanan Konstruksi</h3>
    <div class="row">
      @forelse ($pesananKontruksi as $pesanan)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $pesanan->nama_konsumen }}</h5>
              <p class="card-text">Alamat: {{ $pesanan->alamat_konsumen }}</p>
              <p class="card-text">Nomor HP: {{ $pesanan->no_hpkonsumen }}</p>
              <p class="card-text">Konstruksi yang dipesan: {{ $pesanan->nama_kontruksi }}</p>
              <p class="card-text">Total Bayar: Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
              <p class="card-text">DP Bayar: Rp. {{ number_format($pesanan->dp_bayar, 0, ',', '.') }}</p>
              <p class="card-text">Sisa Bayar: Rp. {{ number_format($pesanan->sisa_bayar, 0, ',', '.') }}</p>
              <p class="card-text">Status: {{ $pesanan->status }}</p>
            </div>
          </div>
        </div>
      @empty
        <p>Tidak ada pesanan konstruksi.</p>
      @endforelse
    </div>

    <h3>Pesanan Tukang</h3>
    <div class="row">
      @forelse ($pesananTukang as $pesanan)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $pesanan->nama_konsumen }}</h5>
              <p class="card-text">Alamat: {{ $pesanan->alamat_konsumen }}</p>
              <p class="card-text">Nomor HP: {{ $pesanan->no_hpkonsumen }}</p>
              <p class="card-text">Tukang yang dipesan: {{ $pesanan->nama_tukang }}</p>
              <p class="card-text">Total Bayar: Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
              <p class="card-text">Status: {{ $pesanan->status }}</p>
            </div>
          </div>
        </div>
      @empty
        <p>Tidak ada pesanan tukang.</p>
      @endforelse
    </div>

    <h3>Pesanan Material</h3>
    <div class="row">
      @forelse ($pesananMaterial as $pesanan)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $pesanan->nama_konsumen }}</h5>
              <p class="card-text">Alamat: {{ $pesanan->alamat_konsumen }}</p>
              <p class="card-text">Nomor HP: {{ $pesanan->no_hpkonsumen }}</p>
              <p class="card-text">Material yang dipesan: {{ $pesanan->nama_material }}</p>
              <p class="card-text">Total Bayar: Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
              <p class="card-text">Status: {{ $pesanan->status }}</p>
            </div>
          </div>
        </div>
      @empty
        <p>Tidak ada pesanan material.</p>
      @endforelse
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm
