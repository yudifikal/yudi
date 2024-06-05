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
    }

    .nav-link.active {
      background-color: #007bff;
    }

    .content {
      margin-left: 280px;
      padding: 20px;
      padding-top: 30px;
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
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-8">
            <div class="order-card">
              <h5>Pesanan Konsumen</h5>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                  aria-valuemax="100">50%</div>
              </div>
              <div class="d-flex justify-content-between">
                <button class="btn btn-danger" onclick="decreaseProgress()">-</button>
                <button class="btn btn-success" onclick="increaseProgress()">+</button>
              </div>
              <img src="{{ asset('uploads/logo.png') }}" alt="Order Image" class="img-fluid mt-3">
            </div>
            <div class="order-card mt-4">
              <h5>Ulasan Konsumen</h5>
              <div class="card">
                <div class="card-body">
                  <p class="card-text">"Pelayanan sangat memuaskan, hasil pekerjaan rapi dan sesuai dengan harapan."</p>
                  <footer class="blockquote-footer">Konsumen A</footer>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
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
