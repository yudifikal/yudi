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
      border-radius: 10px;
      /* Rounded corners */
      overflow: hidden;
      /* Ensure contents stay within the card */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Soft shadow */
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
    }

    .card-body {
      padding: 1.5rem;
      /* Padding inside the card body */
    }

    .card-footer {
      background-color: #f8f9fa;
      /* Light gray background for footer */
      border-top: none;
      /* Remove default top border */
    }

    .card-footer a.btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .card-footer a.btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;

    }
  </style>
  <title>Jasa Kontruksi</title>
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
              href="/jasakontruksikonsumen">Jasa Kontruksi</a>
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
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <!-- Card 1 -->
      @foreach ($data as $item)
        <div class="col mb-4">
          <div class="card h-100 custom-card bg-light shadow"> <!-- Add shadow class for soft shadow -->
            <img src="{{ asset('uploads/' . $item->foto_kontruksi) }}" alt="Image of {{ $item->nama_kontruksi }}"
              class="card-img-top custom-img">
            <div class="card-body">
              <h5 class="card-title">{{ $item->nama_kontruksi }}</h5>
              <p class="card-text">{{ $item->keterangan_kontruksi }}</p>
              <p class="card-text">{{ 'Harga : Rp.' . number_format($item->harga_kontruksi, null, '.') }}</p>
            </div>
            <div class="card-footer">
              <a href="{{ route('konsultasi.create', $item->id) }}" class="btn btn-primary w-100">Atur jadwal
                konsultasi</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
