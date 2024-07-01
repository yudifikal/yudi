<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan PDF</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <style>
    body {
      font-size: 12px;
      margin: 10px;
      margin-left: 1mm;
      margin-right: 1mm;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }

    table th,
    table td {
      border: 1px solid #000;
      padding: 8px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Daftar Pesanan</h2>

    <h3>Pesanan Tukang</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Tanggal</th>
          <th scope="col">Nama</th>
          <th scope="col">Alamat</th>
          <th scope="col">Nomor HP</th>
          <th scope="col">Pesanan</th>
          <th scope="col">Hari</th>
          <th scope="col">Harga</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pesananTukang as $pesanan)
          <tr>
            <td>{{ $pesanan->tgl_pesanan }}</td>
            <td>{{ $pesanan->user->nama }}</td>
            <td>{{ $pesanan->user->alamat }}</td>
            <td>{{ $pesanan->user->no_hp }}</td>
            <td>{{ $pesanan->tukang->nama_tukang }}</td>
            <td>{{ $pesanan->hari }}</td>
            <td>Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
            <td>{{ $pesanan->status }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h3>Pesanan Material</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Tanggal</th>
          <th scope="col">Nama</th>
          <th scope="col">Alamat</th>
          <th scope="col">Nomor HP</th>
          <th scope="col">Pesanan</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Harga</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pesananMaterial as $pesanan)
          <tr>
            <td>{{ $pesanan->tgl_pesanan }}</td>
            <td>{{ $pesanan->user->nama }}</td>
            <td>{{ $pesanan->user->alamat }}</td>
            <td>{{ $pesanan->user->no_hp }}</td>
            <td>{{ $pesanan->material->nama_material }}</td>
            <td>{{ $pesanan->hari }}</td>
            <td>Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
            <td>{{ $pesanan->status }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
