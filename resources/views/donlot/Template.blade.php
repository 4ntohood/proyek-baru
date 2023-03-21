<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PSTD</title>
  @yield('css')
  <!-- DataTable  -->
  <link rel="stylesheet" href="{{ asset('Admin/LTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/LTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/LTE/dist/css/adminlte.min.css') }}">
  <!-- icon style -->
  <link rel="stylesheet" href="{{ asset('admin/LTE/dist/css/bootstrap-icons.css') }}">

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('admin/LTE/dist/img/SDSD2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .99">
        <span class="brand-text font-weight-light">Dewasutratex</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('admin/LTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">

          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->username }}</a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Menu
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/pstd/ijin" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Perijinan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/pstd/serta" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Sertifikat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/generate-pdf" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Cetak</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  -
                  <span class="right badge badge-danger">pstd</span>
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>P S T D</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('logout')}}">
                    Logout <i class="bi bi-box-arrow-right"></i></a></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        @yield('content')
      </section>
    </div>
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>pstd</b>2021
      </div>
      <!--  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">admin</a>.</strong> All rights reserved. -->
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('admin/LTE/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin/LTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('admin/LTE/dist/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  @yield('js')


</body>

</html>