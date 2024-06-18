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

    .custom-card {
      height: 500px;
      /* Desired card height */
      margin-bottom: 20px;
    }

    .custom-img {
      height: 300px;
      /* Image height inside the card */
      object-fit: cover;
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
      padding-top: 70px;
      /* Adjusted based on navbar height and desired spacing */
    }

    .card {
      border: none;
      /* Remove default border */
      background-color: #fff;
      /* White background */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Soft shadow */
    }

    .card-body {
      padding: 20px;
      /* Padding inside card body */
    }

    .card-title {
      font-size: 1.25rem;
      /* Larger title */
      margin-bottom: 10px;
      /* Bottom margin */
    }
  </style>
  <title>Material</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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

  <div class="container-fluid container-fluid-content">
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
      <!-- Cards -->
      @foreach ($data as $item)
        <div class="col mb-4">
          <div class="card h-100 custom-card bg-light">
            <img src="{{ asset('uploads/' . $item->foto_material) }}" alt="Image of {{ $item->nama_material }}"
              class="card-img-top custom-img">
            <div class="card-body">
              <h5 class="card-title">{{ $item->nama_material }}</h5>
              <p class="card-text">{{ $item->keterangan_material }}</p>
              <p class="card-text">{{ 'Harga : Rp.' . number_format($item->harga_material, null, '.') }}</p>
              <p class="card-text">{{ 'Status : ' . $item->status }}</p>
            </div>
            <div class="card-footer">
              <a href="{{ route('formPesananMaterial', ['id' => $item->id]) }}" class="btn btn-primary w-100">Buat
                Pesanan</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
