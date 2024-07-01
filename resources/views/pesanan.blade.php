<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pesanan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
      color: white !important;
    }

    .content {
      margin-left: 280px;
      padding: 20px;
      overflow-x: hidden;
    }

    .status-belum {
      background-color: #dc3545;
      color: white;
    }

    .status-sudah {
      background-color: #28a745;
      color: white;
    }

    .table-container {
      margin-top: 20px;
      border: 1px solid #dee2e6;
      padding: 10px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow-x: hidden;
      overflow-x: auto;
      /* Scroll jika terlalu lebar */
    }

    .table {
      min-width: 100%;
      /* Atur lebar minimum tabel agar tidak terlalu kecil */
    }
  </style>
</head>

<body class="vh-100">
  <div class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white sidebar">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">CV. Bangun Bersama</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link text-white {{ Request::is('dashboardadmin') ? 'active' : '' }}"
            aria-current="page">
            Dashboard
          </a>
        </li>
        <li>
          <a href="/jasakontruksi" class="nav-link text-white {{ Request::is('jasakontruksi') ? 'active' : '' }}">
            Jasa Konstruksi
          </a>
        </li>
        <li>
          <a href="/jasatukang" class="nav-link text-white {{ Request::is('jasatukang') ? 'active' : '' }}">
            Jasa Tukang
          </a>
        </li>
        <li>
          <a href="/material" class="nav-link text-white {{ Request::is('material') ? 'active' : '' }}">
            Material Bangunan
          </a>
        </li>
        <li>
          <a href="/pesanan" class="nav-link text-white {{ Request::is('pesananadmin') ? 'active' : '' }}">
            Pesanan
          </a>
        </li>
        <li>
          <a href="/konsumen" class="nav-link text-white {{ Request::is('konsumen') ? 'active' : '' }}">
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
        <form action="{{ route('pesanan.cetakPdf') }}" method="GET" class="mb-3">
          <div class="row">
            <div class="col-md-4">
              <label for="start_date" class="form-label">Tanggal Mulai</label>
              <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="col-md-4">
              <label for="end_date" class="form-label">Tanggal Akhir</label>
              <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <div class="col-md-4 align-self-end">
              <button type="submit" class="btn btn-primary">Cetak PDF</button>
            </div>
          </div>
        </form>
        <h2>Daftar Pesanan</h2>

        <div class="table-container">
          <h3>Pesanan Tukang</h3>
          <table id="pesananTukangTable" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Pesanan</th>
                <th scope="col">Hari</th>
                <th scope="col">Mulai</th>
                <th scope="col">Selesai</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($pesananTukang as $pesanan)
                <tr>
                  <td>{{ $pesanan->tgl_pesanan }}</td>
                  <td>{{ $pesanan->user->nama }}</td>
                  <td>{{ $pesanan->user->alamat }}</td>
                  <td>{{ $pesanan->user->no_hp }}</td>
                  <td>{{ $pesanan->tukang->nama_tukang }}</td>
                  <td>{{ $pesanan->hari }}</td>
                  <td>{{ $pesanan->tanggal_mulai }}</td>
                  <td>{{ $pesanan->tanggal_selesai }}</td>
                  <td>Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                  <td>{{ $pesanan->status }}</td>
                  <td>
                    @if ($pesanan->status == 'dibayar')
                      <form action="{{ route('pesanan.update', ['id' => $pesanan->id, 'type' => 'tukang']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn status-belum">Kirim Pesanan</button>
                      </form>
                    @elseif($pesanan->status == 'Dikirim')
                      <button class="btn status-sudah" disabled>Sudah Dikirim</button>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="9">Tidak ada pesanan tukang.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="table-container">
          <h3>Pesanan Material</h3>
          <table id="pesananMaterialTable" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Pesanan Material</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($pesananMaterial as $pesanan)
                <tr>
                  <td>{{ $pesanan->tgl_pesanan }}</td>
                  <td>{{ $pesanan->user->nama }}</td>
                  <td>{{ $pesanan->user->alamat }}</td>
                  <td>{{ $pesanan->user->no_hp }}</td>
                  <td>{{ $pesanan->material->nama_material }}</td>
                  <td>{{ $pesanan->hari }}</td>
                  <td>Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                  <td>{{ $pesanan->status }}</td>
                  <td>
                    @if ($pesanan->status == 'dibayar')
                      <form action="{{ route('pesanan.update', ['id' => $pesanan->id, 'type' => 'material']) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn status-belum">Kirim Pesanan</button>
                      </form>
                    @elseif($pesanan->status == 'Dikirim')
                      <button class="btn status-sudah" disabled>Sudah Dikirim</button>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="9">Tidak ada pesanan material.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#pesananTukangTable').DataTable();
      $('#pesananMaterialTable').DataTable();
    });
  </script>
</body>

</html>
