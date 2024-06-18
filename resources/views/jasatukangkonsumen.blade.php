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

    .card-custom {
      margin-top: 70px;
      /* Reduced space between navbar and cards */
    }

    .card-body {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .card-body img {
      max-width: 100px;
      max-height: 100px;
      margin-right: 20px;
    }

    .card-content {
      display: flex;
      align-items: center;
      width: 100%;
      justify-content: space-between;
    }

    .card-content>div {
      margin-right: 20px;
    }

    .card-title {
      margin-bottom: 0;
    }

    .card-price,
    .card-description,
    .card-status {
      margin: 0 10px;
    }

    .btn-primary {
      white-space: nowrap;
    }
  </style>
  <title>Jasa Tukang</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; width: 100%; z-index: 1000; top: 0;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        CV. BANGUN BERSAMA
      </a>
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

  <div class="container-fluid card-custom">
    @foreach ($data as $item)
      <div class="card mb-4 bg-light">
        <div class="card-body">
          <img src="{{ asset('uploads/' . $item->foto_tukang) }}" width="100">
          <div class="card-content">
            <h4 class="card-title mb-1">{{ $item->nama_tukang }}</h4>
            <div class="card-price">{{ 'Rp.' . number_format($item->harga_tukang, null, '.') }}</div>
            <div class="card-description">{{ $item->keterangan_tukang }}</div>
            <div class="card-status">{{ $item->status }}</div>
            <a href="{{ route('formPesananTukang', ['id' => $item->id]) }}" class="btn btn-primary">Tambahkan
              Pesanan</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
