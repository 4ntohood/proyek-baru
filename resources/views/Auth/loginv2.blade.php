<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PSTD | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/LTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin/LTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/LTE/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>DEWASUTRATEX</b></a>
  </div>
  <!-- /.login-logo -->
<form action="{{url('proses_login')}}" method="POST" id="logForm">
{{ csrf_field() }}
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login </p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="nama" class="form-control" placeholder="Nrp/ Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tie"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" id="lokasi1">
              <label for="lokasi1">
                Lokasi 1
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6 text-right">
          <div class="icheck-primary">
              <input type="checkbox" id="lokasi2" checked>
              <label for="lokasi2" >
                Lokasi 2
              </label>
            </div>
          <!--  <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>-PSTD-</p>
        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>Log In</button>
                
      </div>
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('admin/LTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/LTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/LTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
