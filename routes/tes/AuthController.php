<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'adm') {
                return redirect()->intended('adm');
            } elseif ($user->level == 'user') {
                return redirect()->intended('user');
            }
        }
        return view('Auth.login');
    }
    //----- untuk password harus pake bcrypt dulu
    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('username', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::User();
            if ($user->level == 'adm') {
                return redirect()->intended('adm');
            } elseif ($user->level == 'user') {
                return redirect()->intended('user');
            }
            return redirect()->intended('/pstd');
        }

        return redirect('/')
            ->withInput()
            ->withErrors(['login_gagal' => 'Password Tidak Cocok.']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
