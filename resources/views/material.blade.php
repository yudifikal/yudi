<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Material Bangunan</title>
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
    }

    .nav-link.active {
      background-color: #007bff;
    }

    .content {
      margin-left: 280px;
      padding: 20px;
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

    <div class="content">
      @if (Session::has('success'))
        <div class="pt-3">
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
        </div>
      @endif
      <div class="p-5">
        <div class="row">
          <!-- FORM PENCARIAN -->
          <div class="pb-3">
            <form class="d-flex" action="" method="get" enctype="multipart/form-data">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
          </div>

          <!-- TOMBOL TAMBAH DATA -->
          <div class="pb-3">
            <a href='/tambahmaterial' class="btn btn-primary">+ Tambah Data</a>
          </div>

          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-4">Harga</th>
                <th class="col-md-2">Foto</th>
                <th class="col-md-2">Keterangan</th>
                <th class="col-md-2">Status</th>
                <th class="col-md-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = $data->firstItem(); ?>
              @foreach ($data as $item)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $item->nama_material }}</td>
                  <td>{{ 'Rp.' . number_format($item->harga_material, null, '.') }}</td>
                  <td><img src="{{ asset('uploads/' . $item->foto_material) }}" width="50"></td>
                  <td>{{ $item->keterangan_material }}</td>
                  <td>{{ $item->status }}</td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group">
                      <a href='{{ 'material/' . $item->id . '/edit' }}' class="btn btn-warning btn-block me-2"
                        style="color: black; font-size: 14px;">Edit</a>
                      <form class="d-inline" action="{{ url('material/' . $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-block"
                          style="color: black; font-size: 14px;">Hapus</button>
                      </form>
                  </td>
        </div>

        </tr>
        <?php $i++; ?>
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
