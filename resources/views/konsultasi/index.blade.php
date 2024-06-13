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
  <div class="container-fluid mt-5 pt-4">
    <h2>Jadwal Konsultasi</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Nomor HP</th>
          <th>Kontruksi</th>
          <th>Harga Kontruksi</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($konsultasi as $item)
          <tr>
            <td>{{ $item->user->nama }}</td>
            <td>{{ $item->user->alamat }}</td>
            <td>{{ $item->user->no_hp }}</td>
            <td>{{ $item->kontruksi->nama_kontruksi }}</td>
            <td>{{ $item->kontruksi->harga_kontruksi }}</td>
            <td>{{ $item->tanggal_konsultasi }}</td>
            <td>{{ $item->jam_konsultasi }}</td>
            <td>{{ $item->status }}</td>
            <td>
              @if ($item->status == 'Disetujui')
                <a href="{{ route('formPesananKontruksi', ['id' => $item->id]) }}" class="btn btn-primary">Buat
                  Pesanan</a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
