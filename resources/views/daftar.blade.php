<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="asset/bootstrap.min.css">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">

      <div class="card o-hidden border-0 shadow-lg my-5">

        <div class="row">
          <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
        </div>
        <form action="/daftar" method="POST">


          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Nomor Hp</label>
            <input type="text" name="no_hp" class="form-control">
          </div>
          <button class="btn btn-success">kirim</button>
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>

  <script src="bootstrap.bundle.min.js"></script>

</body>

</html>
