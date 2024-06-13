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

    .custom-card {
      height: 400px;
      /* Tinggi kartu yang diinginkan */
      margin-bottom: 20px;
    }

    .custom-img {
      height: 200px;
      /* Tinggi gambar di dalam kartu */
      object-fit: cover;
    }
  </style>
  <title>Material</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; width: 100%; z-index: 1000; top:0;">
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
  <div class="container-fluid mt-5" style="padding-top: 30px;">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      @if ($data->isEmpty())
        <p>No data available</p>
      @else
        @foreach ($data as $item)
          <div class="col">
            <div class="card h-100 custom-card bg-light">
              <img src="{{ asset('uploads/' . $item->foto_material) }}" alt="Image of {{ $item->nama_material }}"
                class="card-img-top custom-img">
              <div class="card-body">
                <h5 class="card-title">{{ $item->nama_material }}</h5>
                <p class="card-text">{{ $item->keterangan_material }}</p>
                <p class="card-text">{{ 'Harga : Rp.' . number_format($item->harga_material, null, '.') }}</p>
                <p class="card-text">{{ $item->status }}</p>
              </div>
              <div class="card-footer">
                <a href="{{ route('formPesananMaterial', ['id' => $item->id]) }}" class="btn btn-primary">Buat
                  Pesanan</a>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
