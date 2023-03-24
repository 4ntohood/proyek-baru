<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="stylesheet" href="{{ asset('admin/LTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset ('assets/cssloginv3/style.css') }}">
    <style>
        /*@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";*/
        @import "{{asset ('assets/cssloginv3/all.css') }}";

        html,
        body {
            height: 100%;
        }

        .bg {
            background-image: url('/assets/img/maersk1.jpg');
            height: 100%;
            filter: blur(1px);
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .login-box {
            width: 280px;
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
        }

        .login-box h1 {
            float: left;
            font-size: 40px;
            border-bottom: 6px solid #ffffff;
            margin-bottom: 50px;
            padding: 13px 0;
        }

        .login-image {
            float: left;
            padding: 0px 0;
            margin: 40px 0;
            margin-left: 25px;

        }

        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #ffffff;
        }

        .textbox i {
            width: 26px;
            float: left;
            text-align: center;
        }

        .textbox input {
            border: none;
            outline: none;
            background: none;
            color: black;
            font-size: 18px;
            width: 80%;
            float: left;
            margin: 0 10px;
        }

        .btn {
            width: 100%;
            background: none;
            border: 2px solid #ffffff;
            color: black;
            padding: 5px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }
    </style>
</head>

<body>
    <div class="bg"></div>
    <form action="{{url('proses_login')}}" method="POST" id="logForm">
        {{ csrf_field() }}
        <div class="login-box">

            <h1>Login</h1>
            <div class="login-image">
                <img src="{{ asset('assets/img/SDSD2.png') }}" class="img-circle elevation-2" height="80px">
            </div>
            <div class="textbox">
                <i class="fas fa-user" style="color: #ffffff;"></i>
                <input type="text" name="username" placeholder="Username">
                @if($errors->has('username'))
                <span class="error">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="textbox">
                <i class="fas fa-lock" style="color: #ffffff;"></i>
                <input type="password" name="password" placeholder="Password">
                @if($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>Log In</button>
        </div>
    </form>
</body>

</html>