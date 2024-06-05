<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jasa Kontruksi</title>
  <link rel="stylesheet" href="{{ asset('asset/bootstrap.min.css') }}">
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
            Jasa Kontruksi
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
      <form action='{{ url('jasakontruksi/' . $data->id_kontruksi) }}' method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <a href='{{ url('jasakontruksi') }}' class="btn btn-secondary">Kembali</a>
          <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">No</label>
            <div class="col-sm-10">
              {{ $data->id_kontruksi }}
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Kontruksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $data->nama_kontruksi }}" name='nama_kontruksi'
                id="nama_kontruksi">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $data->harga_kontruksi }}" name='harga_kontruksi'
                id="harga_kontruksi">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name='foto_kontruksi' id="foto_kontruksi">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $data->keterangan_kontruksi }}"
                name='keterangan_kontruksi' id="keterangan_kontruksi">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
          </div>
      </form>
  </div>
  <script src="{{ asset('asset/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
