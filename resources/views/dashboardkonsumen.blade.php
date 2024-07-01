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

    .below-navbar-image {
      /* height: 160px;
      background-image: url('{{ asset('uploads/dashboard.png') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      width: 100%; */
      margin-top: 56px;
      /* Same height as navbar */
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
      padding-top: 0rem;
    }

    .portfolio {
      padding: 60px 0;
    }

    .portfolio-item {
      margin-bottom: 30px;
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 1s ease-out, transform 1s ease-out;
    }

    .portfolio-item.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .portfolio-item img {
      border-radius: 5px;
    }

    .portfolio-item .card-body {
      padding: 1.5rem;
    }

    .portfolio-item .card-footer {
      background-color: #f8f9fa;
      border-top: none;
    }

    .footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }
  </style>
  <title>Dashboard</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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

  <div class="below-navbar-image">
    <img src="{{ asset('uploads/dashboard.png') }}" class="img-fluid" alt="Pesanan">
  </div>
  <div class="container-fluid container-fluid-content">
    <h6>JADWAL KONSULTASI :</h6>
    <table class="table table-bordered">
      <thead>
        <tr>
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
            <td>{{ $item->kontruksi->nama_kontruksi }}</td>
            <td>{{ $item->kontruksi->harga_kontruksi }}</td>
            <td>{{ $item->tanggal_konsultasi }}</td>
            <td>{{ $item->jam_konsultasi }}</td>
            <td>{{ $item->status }}</td>
            <td>
              @if ($item->status == 'Ditolak, Silahkan atur jadwal baru')
                <a href="{{ route('jasakontruksikonsumen.index') }}" class="btn btn-primary">Atur Jadwal Baru</a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="portfolio">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 portfolio-item">
            <img src={{ asset('uploads/portofolio.png') }} class="card-img-top" alt="Company Introduction">
            <div class="card-body">
              <h5 class="card-title">About CV. Bangun Bersama</h5>
              <p class="card-text">
                CV. Bangun Bersama is a leading construction company dedicated to providing top-notch services in the
                field of building and construction. With years of experience and a team of skilled professionals, we
                ensure high-quality workmanship and customer satisfaction. Our services include residential and
                commercial construction, renovations, and custom building projects. We take pride in our ability to
                deliver projects on time and within budget, while maintaining the highest standards of safety and
                sustainability.
              </p>
              <p class="card-text">
                Our portfolio showcases a diverse range of projects, from small residential homes to large commercial
                complexes. We are committed to innovation and excellence, constantly striving to exceed our clients'
                expectations. Contact us today to discuss your construction needs and discover how we can bring your
                vision to life.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer">
    <p>&copy; 2024 CV. BANGUN BERSAMA</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var portfolioItems = document.querySelectorAll('.portfolio-item');

      function onScroll() {
        portfolioItems.forEach(function(item) {
          if (item.getBoundingClientRect().top < window.innerHeight - 100) {
            item.classList.add('visible');
          }
        });
      }

      window.addEventListener('scroll', onScroll);
      onScroll(); // Trigger the scroll event initially in case items are already in view
    });
  </script>
</body>

</html>
