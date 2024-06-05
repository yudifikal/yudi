<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="asset/bootstrap.min.css">
  <link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">
  <style>
    .bg-login-image {
      background-image: url('{{ asset('uploads/logo.png') }}');
      background-size: contain;
      background-repeat: no-repeat;
    }

    .row {
      position: relative;
    }

    .wide-input {
      max-width: 100%;
    }

    .full-width-button {
      width: 100%;
    }
  </style>
  <title>Login</title>
</head>

<body>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-13 col-md-13">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h1 text-gray-900 mb-4">{{ __('LOGIN') }}</h1>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="d-flex flex-column">
                      @csrf

                      <div class="form-group mb-3">
                        <label for="email">{{ __('E-Mail') }}</label>
                        <input id="email" type="email"
                          class="form-control wide-input @error('email') is-invalid @enderror" name="email"
                          value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group mb-3">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password"
                          class="form-control wide-input @error('password') is-invalid @enderror" name="password"
                          required autocomplete="current-password">
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary full-width-button">
                          {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                          <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                          </a>
                        @endif
                      </div>
                      <div class="form-group mb-3 text-center">
                        <a href="/daftar" class="btn btn-link">Registrasi</a>
                      </div>

                    </form>

                  </div>
                </div>
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
