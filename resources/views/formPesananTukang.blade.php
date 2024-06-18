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

    .navbar-nav .nav-link {
      font-weight: normal;
      color: white;
    }

    .navbar-nav .nav-link.active {
      font-weight: bold;
      color: #007bff !important;
    }

    .form-custom {
      margin-top: 70px;
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-custom h2 {
      margin-bottom: 20px;
    }

    .form-control[readonly] {
      background-color: #ffffff;
      opacity: 1;
    }

    .btn-primary {
      white-space: nowrap;
    }
  </style>
  <title>Form Pesanan Tukang</title>
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

  <div class="container form-custom">
    <h2>Form Pesanan Tukang</h2>
    <form action="{{ route('buatPesananTukang') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama_konsumen" value="{{ Auth::user()->nama }}"
          readonly>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat_konsumen"
          value="{{ Auth::user()->alamat }}" readonly>
      </div>
      <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hpkonsumen" value="{{ Auth::user()->no_hp }}"
          readonly>
      </div>
      <div class="mb-3">
        <label for="pesanan" class="form-label">Pesanan</label>
        <input type="text" class="form-control" id="pesanan" name="pesanan" value="{{ $tukang->nama_tukang }}"
          readonly>
      </div>
      <div class="mb-3">
        <label for="jumlah_hari" class="form-label">Jumlah Hari</label>
        <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" value="1" min="1"
          max="30">
      </div>
      <div class="mb-3">
        <label for="total_bayar" class="form-label">Total Bayar</label>
        <input type="number" class="form-control" id="total_bayar" name="total_bayar"
          value="{{ $tukang->harga_tukang }}" readonly>
      </div>
      <input type="hidden" name="tukang_id" value="{{ $tukang->id }}">
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('jumlah_hari').addEventListener('input', function() {
      var jumlahHariInput = document.getElementById('jumlah_hari');
      var totalBayarInput = document.getElementById('total_bayar');
      var hargaTukang = {{ $tukang->harga_tukang }};
      var jumlahHari = parseInt(jumlahHariInput.value);
      totalBayarInput.value = hargaTukang * jumlahHari;
    });
  </script>
</body>

</html>
