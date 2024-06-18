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
      font-weight: bold;
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
      font-weight: bold;
    }

    .card-text {
      margin-bottom: 0.5rem;
    }

    .card {
      height: 100%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .container {
      height: 100%;
    }

    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .container {
      overflow-y: auto;
    }

    .section-title {
      margin-top: 1.5rem;
      margin-bottom: 1rem;
      font-weight: bold;
      border-bottom: 2px solid #007bff;
      padding-bottom: 0.5rem;
    }

    .navbar-nav .nav-link.active {
      font-weight: bold;
      color: #007bff !important;
    }

    .nav-link {
      transition: color 0.3s ease;
      font-weight: bold;
    }

    .nav-link:hover {
      color: #007bff !important;
    }

    .container-fluid-content {
      padding-top: 3rem;
    }

    .btn-pay-now {
      margin-top: auto;
      background-color: #007bff;
      color: white;
      font-weight: bold;
    }

    .btn-pay-now:hover {
      background-color: #0056b3;
    }
  </style>
  <title>Daftar Pesanan</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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

  <div class="container-fluid container-fluid-content">
    <h2 class="mt-5">Form Pembayaran</h2>
    <form action="{{ route('bayar.process') }}" method="POST">
      @csrf
      <input type="hidden" name="order_id" value="{{ $pesanan->id }}">
      <input type="hidden" name="amount" value="{{ $pesanan->total_bayar }}">
      <div class="mb-3">
        <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
        <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen"
          value="{{ $pesanan->nama_konsumen }}" readonly>
      </div>
      <div class="mb-3">
        <label for="pesanan" class="form-label">pesanan</label>
        <input type="text" class="form-control" id="pesanan" name="pesanan" value="{{ $pesanan->pesanan }}"
          readonly>
      </div>
      <div class="mb-3">
        <label for="hari" class="form-label">Jumlah</label>
        <input type="text" class="form-control" id="hari" name="hari" value="{{ $pesanan->jumlah_hari }}"
          readonly>
      </div>
      <div class="mb-3">
        <label for="total_bayar" class="form-label">Total Bayar</label>
        <input type="text" class="form-control" id="total_bayar"
          value="Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}" readonly>
      </div>
      <button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
