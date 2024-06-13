<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Material</title>
  <link rel="stylesheet" href="asset/bootstrap.min.css">
</head>

<body class="vh-100">
  <div class="d-flex h-100">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">CV. Bangun Bersama</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link active" aria-current="page">
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
    <main class="container">
      <!-- START FORM -->
      @if ($errors->any())
        <div class="pt-3">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
              @endforeach
            </ul>
          </div>
        </div>

      @endif
      <form action='{{ url('material') }}' method='post' enctype="multipart/form-data">
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <a href='{{ url('material') }}' class="btn btn-secondary">Kembali</a>
          <div class="mb-3 row">

          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama material</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ old('nama_material') }}" name='nama_material'
                id="nama_material">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ old('harga_material') }}" name='harga_material'
                id="harga_material">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name='foto_material' id="foto_material" accept="image/*">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ old('keterangan_material') }}"
                name='keterangan_material' id="keterangan_material">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ old('status') }}" name='status' id="status">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
          </div>
      </form>
  </div>

  <script src="bootstrap.bundle.min.js"></script>
</body>

</html>
