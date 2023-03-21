<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>FOTO</title>

  <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">
  <script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('Admin/LTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('admin/LTE/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/LTE/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/LTE/dist/css/bootstrap-icons.css') }}">
  @yield('css')
</head>
<!-- <body class="hold-transition sidebar-mini"> -->

<body class="hold-transition sidebar-mini sidebar-closed sidebar-collapse">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li>
          <h1>F O T O</h1>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" href="{{route('removesession')}}"> <b>{{session('bPeriode')}}</b> <i class="fas fa-calendar-check"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('logout')}}"><b>Logout</b> <i class="fas fa-sign-out-alt"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button"><i class="fas fa-expand-arrows-alt"></i></a>
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
            @if ( Auth::user()->name == 'anto'){
            <img src="{{ asset('admin/LTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            }@elseif (Auth::user()->name == 'esti'){
            <img src="{{ asset('assets/img/esti.jpg') }}" class="img-circle elevation-2" alt="User Image">
            }@elseif (Auth::user()->name == 'nabila'){
            <img src="{{ asset('assets/img/nabila.jpg') }}" class="img-circle elevation-2" alt="User Image">
            }@endif
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
            </li>
            <li class="nav-item">
              <a href="index" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('watermark_express')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>Watermark express</p>
              </a>
            </li>
          </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                -
                <span class="right badge badge-danger">fotokontainer</span>
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

            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">


              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        @yield('content')
        @include('sweetalert::alert')
        <!-- @include('sweetalert::alert') -->
      </section>
    </div>
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>fk</b>2023
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
  <script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('admin/LTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('assets/plugin/loading/overlay/loadingoverlay.min.js')}}"></script>

  @yield('js')


</body>

</html>