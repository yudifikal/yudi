<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  <link rel="stylesheet" href="asset/bootstrap.min.css">
  <style>
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      padding: 48px 0 0;
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
      height: 100vh;
      overflow-y: auto;
      width: 280px;
      background-color: #343a40;
      /* Ubah warna sidebar sesuai keinginan */
    }

    .nav-link.active {
      background-color: #007bff;
    }

    .content {
      margin-left: 280px;
      padding: 20px;
      padding-top: 30px;
    }

    .order-card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Tambahkan bayangan halus */
      transition: 0.3s;
      /* Efek transisi */
    }

    .order-card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      /* Efek bayangan saat hover */
    }

    .order-card .card-body {
      padding: 20px;
    }

    .order-card .card-title {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: #007bff;
      /* Warna judul card */
    }

    .order-card .card-text {
      font-size: 1.5rem;
      font-weight: bold;
    }

    h2.dashboard-title {
      color: white;
      background-color: black;
      padding: 10px;
      display: inline-block;
    }
  </style>
</head>

<body class="vh-100">
  <div class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sidebar">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">CV. Bangun Bersama</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link" aria-current="page">
            Dashboard
          </a>
        </li>
        <li>
          <a href="/jasakontruksi" class="nav-link text-white">
            Jasa Konstruksi
          </a>
        </li>
        <li>
          <a href="/jasatukang" class="nav-link text-white">
            Jasa Tukang
          </a>
        </li>
        <li>
          <a href="/material" class="nav-link text-white">
            Material Bangunan
          </a>
        </li>
        <li>
          <a href="/pesanan" class="nav-link text-white">
            Pesanan
          </a>
        </li>
        <li>
          <a href="/konsumen" class="nav-link text-white">
            Konsumen
          </a>
        </li>
        <li>
          <a href="{{ route('logout') }}" class="nav-link text-white">
            Logout
          </a>
        </li>
      </ul>
    </div>
    <div class="content w-100">
      <div class="container">
        <a href="/tambahpengelola" class="btn btn-primary mb-3">Tambah Admin</a>

        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <div class="row">
          <div class="col-md-4">
            <div class="card order-card">
              <div class="card-body">
                <h5 class="card-title">Jumlah Tukang</h5>
                <p class="card-text">{{ $jmlTukang }} orang</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card order-card">
              <div class="card-body">
                <h5 class="card-title">Jumlah Material</h5>
                <p class="card-text">{{ $jmlMaterial }}</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card order-card">
              <div class="card-body">
                <h5 class="card-title">Jumlah Pesanan</h5>
                <p class="card-text">{{ $totalPesanan }}</p>
              </div>
            </div>
          </div>
        </div>

        <h3 class="mt-4">Kelola Jadwal Konsultasi</h3>
        <table class="table table-bordered mt-3">
          <thead class="table-dark">
            <tr>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nomor HP</th>
              <th>Kontruksi</th>
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
                <td>{{ $item->tanggal_konsultasi }}</td>
                <td>{{ $item->jam_konsultasi }}</td>
                <td>{{ $item->status }}</td>
                <td>
                  <form action="{{ route('admin.konsultasi.approve', $item->id) }}" method="POST"
                    style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                  </form>
                  <form action="{{ route('admin.konsultasi.reject', $item->id) }}" method="POST"
                    style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var path = window.location.pathname;
        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
          if (link.getAttribute('href') === path) {
            link.classList.add('active');
          } else {
            link.classList.remove('active');
          }
        });
      });
    </script>
</body>

</html>
