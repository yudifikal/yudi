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

    .card-custom {
      padding-top: 80px;
    }

    .card-body {
      display: flex;
      flex-direction: column;
    }

    .card-title {
      font-size: 1.25rem;
      margin-bottom: 0.75rem;
      font-weight: bold;
    }

    .card-text {
      margin-bottom: 0.5rem;
    }

    .card {
      height: 100%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .container {
      height: 100%;
    }

    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .container {
      overflow-y: auto;
    }

    .section-title {
      margin-top: 1.5rem;
      margin-bottom: 1rem;
      font-weight: bold;
      border-bottom: 2px solid #007bff;
      padding-bottom: 0.5rem;
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

    .container-fluid-content {
      padding-top: 3rem;
    }

    .btn-pay-now {
      margin-top: auto;
      background-color: #007bff;
      color: white;
      font-weight: bold;
    }

    .btn-pay-now:hover {
      background-color: #0056b3;
    }

    .btn-order-received {
      margin-top: 0.5rem;
      background-color: #dc3545;
      color: white;
      font-weight: bold;
    }

    .btn-order-received:hover {
      background-color: #c82333;
    }

    .status-btn {
      margin-top: 10px;
    }

    .status-belum {
      background-color: #dc3545;
      color: white;
    }

    .status-sudah {
      background-color: #28a745;
      color: white;
    }

    .below-navbar-image {
      /* height: 160px;
      background-image: url('{{ asset('uploads/pesanan.png') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      width: 100%; */
      margin-top: 56px;
      /* Same height as navbar */
    }

    .container-fluid-content {
      padding-top: 0rem;
    }
  </style>
  <title>Daftar Pesanan</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CV. BANGUN BERSAMA</a>
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

  <div class="below-navbar-image">
    <img src="{{ asset('uploads/pesanan.png') }}" class="img-fluid" alt="Pesanan">
  </div>
  <div class="container-fluid container-fluid-content">
    {{-- <h2 class="section-title">Daftar Pesanan</h2> --}}
    <h3 class="section-title">Pesanan Tukang</h3>
    <div class="row">
      @forelse ($pesananTukang as $pesanan)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $pesanan->user->nama }}</h5>
              <p class="card-text">Alamat: {{ $pesanan->user->alamat }}</p>
              <p class="card-text">Nomor HP: {{ $pesanan->user->no_hp }}</p>
              <p class="card-text">Tukang yang dipesan: {{ $pesanan->tukang->nama_tukang }}</p>
              <p class="card-text">Tanggal Mulai: {{ $pesanan->tanggal_mulai }}</p>
              <p class="card-text">Tanggal Selesai: {{ $pesanan->tanggal_selesai }}</p>
              <p class="card-text">Jumlah Hari: {{ $pesanan->hari }}</p>
              <p class="card-text">Total Bayar: Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
              <p class="card-text">Tanggal Pesanan: {{ $pesanan->tgl_pesanan }}</p>
              <p class="card-text">Status: {{ $pesanan->status }}</p>
              <form method="post" action="/bayar">
                @csrf
                <input type="hidden" name="harga" value="{{ $pesanan->total_bayar }}">
                <input type="hidden" name="id" value="{{ $pesanan->id }}">
                <input type="hidden" name="nama" value="{{ $pesanan->tukang->nama_tukang }}">
                <input type="hidden" name="jenis" value="tukang">
                @if ($pesanan->status == 'Menunggu Pembayaran')
                  <button class="btn btn-pay-now">Bayar Sekarang</button>
                @endif
              </form>
              @if ($pesanan->status == 'Dikirim')
                <form action="{{ route('pesanankonsumen.update', ['id' => $pesanan->id, 'type' => 'tukang']) }}"
                  method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn status-btn status-belum">Terima Pesanan</button>
                </form>
              @elseif($pesanan->status == 'diterima')
                <button class="btn status-btn status-sudah" disabled>Sudah Diterima</button>
              @endif
            </div>
          </div>
        </div>
      @empty
        <p>Tidak ada pesanan tukang.</p>
      @endforelse
    </div>

    <h3 class="section-title">Pesanan Material</h3>
    <div class="row">
      @forelse ($pesananMaterial as $pesanan)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $pesanan->user->nama }}</h5>
              <p class="card-text">Alamat: {{ $pesanan->user->alamat }}</p>
              <p class="card-text">Nomor HP: {{ $pesanan->user->no_hp }}</p>
              <p class="card-text">Material yang dipesan: {{ $pesanan->material->nama_material }}</p>
              <p class="card-text">Jumlah Pesanan: {{ $pesanan->hari }}</p>
              <p class="card-text">Total Bayar: Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
              <p class="card-text">Status: {{ $pesanan->status }}</p>
              <form method="post" action="/bayar">
                @csrf
                <input type="hidden" name="harga" value="{{ $pesanan->total_bayar }}">
                <input type="hidden" name="id" value="{{ $pesanan->id }}">
                <input type="hidden" name="nama" value="{{ $pesanan->material->nama_material }}">
                <input type="hidden" name="jenis" value="material">
                @if ($pesanan->status == 'Menunggu Pembayaran')
                  <button class="btn btn-pay-now">Bayar Sekarang</button>
                @endif
              </form>
              @if ($pesanan->status == 'Dikirim')
                <form action="{{ route('pesanankonsumen.update', ['id' => $pesanan->id, 'type' => 'material']) }}"
                  method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn status-btn status-belum">Terima Pesanan</button>
                </form>
              @elseif($pesanan->status == 'diterima')
                <button class="btn status-btn status-sudah" disabled>Sudah Diterima</button>
              @endif
            </div>
          </div>
        </div>
    </div>
  @empty
    <p>Tidak ada pesanan material.</p>
    @endforelse
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
