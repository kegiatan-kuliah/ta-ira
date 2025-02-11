<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-OFFICE</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <img src="{{ asset('img/logo-unp.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-OFFICE</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('dashboard.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            @canany(['lihat semua surat masuk','lihat surat masuk'])
              <li class="nav-item">
                <a href="{{ route('in.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-inbox"></i>
                  <p>
                    Surat Masuk
                  </p>
                </a>
              </li>
            @endcan
            @can('lihat surat keluar')
            <li class="nav-item">
              <a href="{{ route('out.index') }}" class="nav-link">
                <i class="nav-icon fas fa-paper-plane"></i>
                <p>
                  Surat Keluar
                </p>
              </a>
            </li>
            @endcan
            <li class="nav-item">
              <a href="{{ route('agenda.index') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Agenda
                </p>
              </a>
            </li>
            @canany(['lihat jenis surat','lihat sifat surat','lihat petugas'])
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @can('lihat jenis surat')
                    <li class="nav-item">
                      <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jenis Surat</p>
                      </a>
                    </li>
                  @endcan
                  @can('lihat sifat surat')
                  <li class="nav-item">
                    <a href="{{ route('level.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sifat Surat</p>
                    </a>
                  </li>
                  @endcan
                  @can('lihat petugas')
                  <li class="nav-item">
                    <a href="{{ route('employee.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Petugas</p>
                    </a>
                  </li>
                  @endcan
                  @can('lihat akses')
                  <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Hak Akses</p>
                    </a>
                  </li>
                  @endcan
                </ul>
              </li>
            @endcan
            <li class="nav-item">
              <a href="{{ route('auth.logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Keluar
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          @yield('breadcrumbs')
        </div>
      </section>

      <section class="content">
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
        @yield('content')
      </section>
    </div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2025 All rights reserved.
    </footer>
  </div>

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/adminlte.min.js') }}"></script>
  <script src="{{ asset('js/datatables.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
  @stack('scripts')
</body>
</html>
