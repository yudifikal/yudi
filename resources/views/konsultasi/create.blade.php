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
      margin-top: 20px;
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

  <div class="container mt-5 pt-5">
    <h2>Jadwalkan Konsultasi</h2>
    <form action="{{ route('konsultasi.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama_konsumen" value="{{ $user->nama }}" readonly>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat_konsumen" value="{{ $user->alamat }}" readonly>
      </div>
      <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor HP</label>
        <input type="text" class="form-control" id="no_hpkonsumen" value="{{ $user->no_hp }}" readonly>
      </div>
      <div class="mb-3">
        <label for="construction_name" class="form-label">Nama Kontruksi</label>
        <input type="text" class="form-control" id="construction_name" value="{{ $kontruksi->nama_kontruksi }}"
          readonly>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="text" class="form-control" id="price"
          value="{{ 'Rp. ' . number_format($kontruksi->harga_kontruksi, 0, '.', ',') }}" readonly>
      </div>
      <div class="mb-3">
        <label for="tanggal_konsultasi" class="form-label">Tanggal Konsultasi</label>
        <input type="date" class="form-control" id="tanggal_konsultasi" name="tanggal_konsultasi" required>
      </div>
      <div class="mb-3">
        <label for="jam_konsultasi" class="form-label">Jam Konsultasi</label>
        <input type="time" class="form-control" id="jam_konsultasi" name="jam_konsultasi" required>
      </div>
      <input type="hidden" name="kontruksi_id" value="{{ $kontruksi->id }}">
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
