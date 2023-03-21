<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\History;
use App\Models\SerTa;
use App\Models\User;
use App\Models\Perijinan;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        return view('uploadfoto.index');
        //$datax = History::paginate(15);
        /**    $count = History::All()->Count();
         *  $countserta = SerTa::All()->Count();
         *  $countijin = Perijinan::All()->Count();

         *   $ijin2018 = Perijinan::Where('periode', 'like', '%' . 2018 . '%')->count();
         *   $ijin2019 = Perijinan::Where('periode', 'like', '%' . 2019 . '%')->count();
         *   $ijin2020 = Perijinan::Where('periode', 'like', '%' . 2020 . '%')->count();
         *   $ijin2021 = Perijinan::Where('periode', 'like', '%' . 2021 . '%')->count();
         *   $ijin2022 = Perijinan::Where('periode', 'like', '%' . 2022 . '%')->count();

         *   $serta2018 = SerTa::Where('periode', 'like', '%' . 2018 . '%')->count();
         *   $serta2019 = SerTa::Where('periode', 'like', '%' . 2019 . '%')->count();
         *   $serta2020 = SerTa::Where('periode', 'like', '%' . 2020 . '%')->count();
         *   $serta2021 = SerTa::Where('periode', 'like', '%' . 2021 . '%')->count();
         *   $serta2022 = SerTa::Where('periode', 'like', '%' . 2022 . '%')->count();
         */
        // $pPeriode = session('pPeriode');
        // $bPeriode = session('bPeriode');

        // $perdate = Perijinan::where('tglhabis', '<', Carbon::now()->addDays(90))->count();
        // $serdate = serTa::where('tglhabis', '<', Carbon::now()->addDays(90))->count();

        // return view('index', compact('datax', 'pPeriode', 'bPeriode', 'perdate', 'serdate'))
        //     // return view('index', compact('datax', 'count', 'countserta', 'countijin', 'pPeriode', 'bPeriode', 'ijin2018', 'ijin2019', 'ijin2020', 'ijin2021', 'ijin2022', 'serta2018', 'serta2019', 'serta2020', 'serta2021', 'serta2022', 'perdate', 'serdate'))
        //     ->with('i', (request()->input('page', 1) - 1) * 15);
    }
    public function readuploadfoto()
    {
        return view('uploadfoto.mainpage');
    }
}
