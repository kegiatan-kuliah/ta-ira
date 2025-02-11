<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-OFFICE</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('img/logo-unp.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width: 100px; margin-bottom: 15px;">
    <h5>E-OFFICE</h5>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-box-msg">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        @if (session('danger'))
          <div class="alert alert-danger">
              {{ session('danger') }}
          </div>
        @endif
        @if (session('danger-with-link'))
          <div class="alert alert-danger">
              {!! session('danger-with-link') !!}
          </div>
        @endif
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
      </div>

      {{ html()->form('POST', route('auth.login'))->open() }}
        <div class="input-group mb-3">
          {{ html()->input('email', 'email')
            ->class('form-control')->attribute('required', true)
            ->attribute('placeholder', 'Isikan email anda') }}
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          {{ html()->input('password', 'password')
            ->class('form-control')->attribute('required', true)
            ->attribute('placeholder', 'Isikan password anda') }}
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      {{ html()->form()->close() }}
    </div>
  </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>
