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
  <div class="container mt-5 pt-4">
    <h2>Form Pesanan Material</h2>
    <form action="{{ route('buatPesananMaterial') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama_konsumen" value="{{ Auth::user()->email }}"
          readonly>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat_konsumen"
          value="{{ Auth::user()->email }}" readonly>
      </div>
      <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hpkonsumen" value="{{ Auth::user()->email }}"
          readonly>
      </div>
      <div class="mb-3">
        <label for="jumlah_hari" class="form-label">Jumlah Pesanan</label>
        <div class="input-group">
          <button class="btn btn-outline-secondary" type="button" id="subtractDays">-</button>
          <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" value="1" min="1"
            max="30" readonly>
          <button class="btn btn-outline-secondary" type="button" id="addDays">+</button>
        </div>
      </div>
      <div class="mb-3">
        <label for="total_bayar" class="form-label">Total Bayar</label>
        <input type="number" class="form-control" id="total_bayar" name="total_bayar"
          value="{{ $material->harga_material }}" readonly>
      </div>
      <input type="hidden" name="material_id" value="{{ $material->id }}">
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('addDays').addEventListener('click', function() {
      var jumlahHariInput = document.getElementById('jumlah_hari');
      var totalBayarInput = document.getElementById('total_bayar');
      var hargaTukang = {{ $material->harga_material }};
      var jumlahHari = parseInt(jumlahHariInput.value);
      if (jumlahHari < 30) {
        jumlahHari++;
        jumlahHariInput.value = jumlahHari;
        totalBayarInput.value = hargaTukang * jumlahHari;
      }
    });

    document.getElementById('subtractDays').addEventListener('click', function() {
      var jumlahHariInput = document.getElementById('jumlah_hari');
      var totalBayarInput = document.getElementById('total_bayar');
      var hargaTukang = {{ $material->harga_material }};
      var jumlahHari = parseInt(jumlahHariInput.value);
      if (jumlahHari > 1) {
        jumlahHari--;
        jumlahHariInput.value = jumlahHari;
        totalBayarInput.value = hargaTukang * jumlahHari;
      }
    });
  </script>
</body>

</html>
