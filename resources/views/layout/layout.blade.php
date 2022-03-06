<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistem Penilaian Kinerja Tenaga Teknis</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <!-- CSS Libraries -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('template/css/components.css')}}">
</head>

<div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
          </ul>
        </form>
        <ul class="navbar-nav navbar-right" style="">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a>Sistem Penilaian Kinerja Tenaga Teknis</a>
          </div>
          <ul class="sidebar-menu">
              <li class="nav-item dropdown">
                <a href="/home" ><i class="fas fa-th-large"></i><span>Home</span></a>
              </li>
              <li class="menu-header">Menu</li>
              <li>
                <a class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pencil-ruler"></i><span>Data Wilayah Kerja & Tenaga Teknis</span></a>
                <ul class="dropdown-menu">
                  @if (Auth()->user()->role == 'superadmin')
                      <li class="active"><a class="nav-link" href="/wilayah">Input Data Wilaya Kerja</a></li>
                  @endif
                  
                  <li><a class="nav-link" href="/tenaga_teknis">Input Data Tenaga Teknis</a></li>
                </ul>
              </li>
              @if (Auth()->user()->role == 'superadmin')
                <li><a class="nav-link" href="/variabel-penilaian"><i class="far fa-file-alt"></i><span>Variabel Penilaian</span></a></li>
              @endif
              
              <li>
                <a class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i><span>Penilaian</span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="/penilaian/kantor">Input Penilaian</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                @if(auth()->user()->role == 'Admin')
                <a href="/user"><i class="far fa-user"></i> <span>Manage User</span></a>
                @endif
              </li>
              @if (Auth()->user()->role == 'superadmin')
                <li><a class="nav-link" href="/pengguna"><i class="far fa-file-alt"></i><span>Pengguna</span></a></li>
              @endif
              
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
            </div>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-body">
                @yield('body')
              </div>
              <div class="card-footer bg-whitesmoke">
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('template/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{asset('template/js/scripts.js')}}"></script>
  <script src="{{asset('template/js/custom.js')}}"></script>
  @yield('footer')

  <!-- Page Specific JS File -->
</body>
</html>
