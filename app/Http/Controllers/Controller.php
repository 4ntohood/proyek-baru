<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }
            if (session('info')) {
                Alert::info(session('info'));
            }
            if (session('warning')) {
                Alert::warning(session('warning'));
            }
            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }
}
