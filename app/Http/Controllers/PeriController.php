<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Golongan;
use App\Models\MasterSerTa;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PeriController extends Controller
{

    public function index()
    {
        return view('Ijin.index');
    }
    public function readijin(Request $request)
    {
        $datax = MasterSerTa::where('jenis', '=', 'I')->paginate(15);
        return view('Ijin.read_ijin', compact('datax'))
            ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    public function create()
    {
        return view('Ijin.create');
    }

    public function store(Request $request)
    {
        $kode = MasterSerTa::where('jenis', 'I')->max('kode');
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
            'jenis' => 'I',
            'keterangan' => $request->keterangan,
            'C_Append' => $request->ip(),
        ]);

        toast('Tambah Master Perusahaan', 'success');
        return redirect()->route('ijin.index');
        //->with('success', 'Tambah Master Sukses.');
    }


    public function show($id)
    {
        $data = MasterSerTa::find($id);
        return view('SerTa.show', compact('data'));
    }


    public function edit($id)
    {
        $data = MasterSerTa::find($id);
        return view('Ijin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = MasterSerTa::findOrFail($id);
        $data->nama = $request->input('nama');
        $data->keterangan = $request->input('keterangan');
        $data->save();
    }

    public function destroy($id)
    {
        $data = MasterSerTa::findOrFail($id);
        $data->delete();
    }
}
