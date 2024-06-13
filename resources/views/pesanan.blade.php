<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pesanan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
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
    }

    .card-text {
      margin-bottom: 0.5rem;
    }

    .card {
      height: 100%;
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

    <div class="content">
      <div class="container">
        <h2>Daftar Pesanan</h2>

        <h3>Pesanan Konstruksi</h3>
        <div class="row">
          @forelse ($pesananKontruksi as $pesanan)
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{ $pesanan->nama_konsumen }}</h5>
                  <p class="card-text">Alamat: {{ $pesanan->alamat_konsumen }}</p>
                  <p class="card-text">Nomor HP: {{ $pesanan->no_hpkonsumen }}</p>
                  <p class="card-text">Total Bayar: Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
                  <p class="card-text">DP Bayar: Rp. {{ number_format($pesanan->dp_bayar, 0, ',', '.') }}</p>
                  <p class="card-text">Sisa Bayar: Rp. {{ number_format($pesanan->sisa_bayar, 0, ',', '.') }}</p>
                  <p class="card-text">Status: {{ $pesanan->status }}</p>
                  <button class="btn status-btn status-belum" data-id="{{ $pesanan->id }}" data-type="kontruksi">Belum
                    Mulai Dikerjakan</button>
                </div>
              </div>
            </div>
          @empty
            <p>Tidak ada pesanan konstruksi.</p>
          @endforelse
        </div>

        <h3>Pesanan Tukang</h3>
        <div class="row">
          @forelse ($pesananTukang as $pesanan)
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{ $pesanan->nama_konsumen }}</h5>
                  <p class="card-text">Alamat: {{ $pesanan->alamat_konsumen }}</p>
                  <p class="card-text">Nomor HP: {{ $pesanan->no_hpkonsumen }}</p>
                  <p class="card-text">Total Bayar: Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
                  <p class="card-text">Status: {{ $pesanan->status }}</p>
                  <button class="btn status-btn status-belum" data-id="{{ $pesanan->id }}" data-type="tukang">Belum
                    Mulai Dikerjakan</button>
                </div>
              </div>
            </div>
          @empty
            <p>Tidak ada pesanan tukang.</p>
          @endforelse
        </div>

        <h3>Pesanan Material</h3>
        <div class="row">
          @forelse ($pesananMaterial as $pesanan)
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{ $pesanan->nama_konsumen }}</h5>
                  <p class="card-text">Alamat: {{ $pesanan->alamat_konsumen }}</p>
                  <p class="card-text">Nomor HP: {{ $pesanan->no_hpkonsumen }}</p>
                  <p class="card-text">Total Bayar: Rp. {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</p>
                  <p class="card-text">Status: {{ $pesanan->status }}</p>
                  <button class="btn status-btn status-belum" data-id="{{ $pesanan->id }}" data-type="material">Belum
                    Mulai Dikerjakan</button>
                </div>
              </div>
            </div>
          @empty
            <p>Tidak ada pesanan material.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Load statuses from localStorage
      var pesananElements = document.querySelectorAll('.status-btn');
      pesananElements.forEach(function(button) {
        var id = button.getAttribute('data-id');
        var type = button.getAttribute('data-type');
        var status = localStorage.getItem(type + '-' + id);

        if (status === 'sudah') {
          button.classList.remove('status-belum');
          button.classList.add('status-sudah');
          button.textContent = 'Sudah Mulai Dikerjakan';
        } else {
          button.classList.add('status-belum');
          button.classList.remove('status-sudah');
          button.textContent = 'Belum Mulai Dikerjakan';
        }
      });
    });

    document.querySelectorAll('.status-btn').forEach(button => {
      button.addEventListener('click', function() {
        var id = this.getAttribute('data-id');
        var type = this.getAttribute('data-type');

        if (this.classList.contains('status-belum')) {
          this.classList.remove('status-belum');
          this.classList.add('status-sudah');
          this.textContent = 'Sudah Mulai Dikerjakan';
          localStorage.setItem(type + '-' + id, 'sudah');
        } else {
          this.classList.remove('status-sudah');
          this.classList.add('status-belum');
          this.textContent = 'Belum Mulai Dikerjakan';
          localStorage.setItem(type + '-' + id, 'belum');
        }
      });
    });
  </script>
</body>

</html>
