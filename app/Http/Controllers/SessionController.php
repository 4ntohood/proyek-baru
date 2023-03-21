<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function accessSessionData(Request $request)
    {
        if ($request->session()->has('pPeriode'))
            echo $request->session()->get('pPeriode');
        else
            echo 'No data in the session';
    }
    public function storeSessionData(Request $request)
    {
        $this->validate($request, [
            'periodepilih'     => 'required',
        ]);
        $pPeriode = $request->get('periodepilih');
        $bPeriode = $request->get('periodebulan');
        $request->session()->put('pPeriode', $pPeriode);
        $request->session()->put('bPeriode', $bPeriode);

        return redirect('adm/index');
    }
    public function deleteSessionData(Request $request)
    {
        $request->session()->forget('pPeriode');
        $request->session()->forget('bPeriode');
        return redirect('adm');
    }
}
