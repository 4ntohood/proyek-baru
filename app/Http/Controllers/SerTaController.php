<?php

namespace App\Http\Controllers;

use App\Models\MasterSerTa;
use Illuminate\Http\Request;
use Alert;


class SerTaController extends Controller
{

    public function index()
    {
        return view('SerTa.index');
    }
    public function readserta()
    {
        $datax = MasterSerTa::where('jenis', '=', 'S')->paginate(15);
        return view('SerTa.read_serta', compact('datax'))
            ->with('i', (request()->input('page', 1) - 1) * 15);
    }
    public function create()
    {
        return view('SerTa.create');
    }

    public function store(Request $request)
    {
        $kode = MasterSerTa::where('jenis', '=', 'S')->max('KODE');
        $strkode = substr($kode, 0, 2);
        $strkode = ++$strkode;
        $kd = sprintf("%02s", $strkode);

        $request->validate([

            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        MasterSerTa::create([
            'kode' => $kd,
            'nama' => $request->nama,
            'jenis' => 'S',
            'keterangan' => $request->keterangan,
            'C_Append' => $request->ip(),
        ]);
    }

    public function show($id)
    {
        $data = MasterSerTa::find($id);
        return view('SerTa.show', compact('data'));
    }


    public function edit($id)
    {
        $data = MasterSerTa::find($id);

        return view('SerTa.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required'
        ]);
        $data = MasterSerTa::findOrFail($id);
        $data->nama = $request->get('nama');
        $data->keterangan = $request->get('keterangan');
        $data->save();
    }


    public function destroy($id)
    {
        $datax = MasterSerTa::findOrFail($id);
        $datax->delete();
    }
}
