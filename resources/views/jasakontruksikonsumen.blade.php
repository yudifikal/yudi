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
      height: 500px;
      /* Tinggi kartu yang diinginkan */
      margin-bottom: 20px;
    }

    .custom-img {
      height: 300px;
      /* Tinggi gambar di dalam kartu */
      object-fit: cover;
    }

    .floating-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
    }
  </style>
  <title>Jasa Kontruksi</title>
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
  <div class="container-fluid mt-5 pt-4">
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <!-- Card 1 -->
      @foreach ($data as $item)
        <div class="col mb-4">
          <div class="card h-100 custom-card bg-light"> <!-- Tambahkan kelas bg-light untuk warna abu-abu -->
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
    <!-- Tombol untuk melihat tampilan jadwal konsultasi dan negosiasi -->
    <a href="{{ route('konsultasi.index') }}" class="btn btn-secondary floating-btn">Lihat Jadwal Konsultasi</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
