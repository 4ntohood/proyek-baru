<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PstdChartController extends Controller
{
    public function index()
    {
        $pstdChart = new PstdChart;
        $pstdChart->labels(['Jan', 'Feb', 'Mar']);
        $pstdChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('index', ['pstdChart' => $pstdChart]);
    }
}
