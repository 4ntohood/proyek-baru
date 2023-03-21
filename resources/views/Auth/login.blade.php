<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('assets/plugin/login/css/bootstrap.min.css')}}">
    <script src="{{ asset('assets/plugin/login/js/all.min.js')}}" crossorigin="anonymous"></script>
</head>
<style>
    body {
        background: #999;
        padding: 40px;
        font-family: "Open Sans Condensed", sans-serif;
    }

    #bg {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: url("{{ asset('assets/d2.jpg') }}") no-repeat center center fixed;
        background-size: cover;

    }
</style>

<body>
    <div id="bg">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    {{-- Error Alert --}}
                                    @if(session('error'))
                                    <div class=" alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{url('proses_login')}}" method="POST" id="logForm">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                @error('login_gagal')
                                                {{-- <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span> --}}
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                    <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                @enderror
                                                <label class="small mb-1" for="inputEmailAddress">Nrp/Nama</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="username" type="text" placeholder="Masukkan Username" />
                                                @if($errors->has('username'))
                                                <span class="error">{{ $errors->first('username') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukkan Password" />
                                                @if($errors->has('password'))
                                                <span class="error">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <!--    <div class="form-group">
                                                
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="lokasi1" type="checkbox"/>
                                                    <label class="custom-control-label" for="lokasi1">Lokasi 1</label>
                                                </div>
                                                
                                               
                                            </div> -->

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" id="lokasi1">
                                                        <label class="small mb-1" for="lokasi1">
                                                            Lokasi 1
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-6 text-right">
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" id="lokasi2" checked>
                                                        <label class="small mb-1" for="lokasi2">
                                                            Lokasi 2
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                {{-- <a class="small" href="#">Forgot Password?</a> --}}
                                                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            {{-- <a href="{{url('register')}}">Belum Punya Akun? Daftar!</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/plugin/login/js/jquery-3.4.1.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/plugin/login/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/scripts.js')}}"></script>

</body>

</html>