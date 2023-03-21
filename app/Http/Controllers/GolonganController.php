<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $datagol = Golongan::All();
        return view('kelompok', compact('datagol'))
            ->with('j', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $tambah = new Golongan();
        $tambah->kelompok = $request->kelompokkecil;
        $tambah->golongan = $request->golongan;
        $tambah->c_append = $request->ip();
        $tambah->save();

        toast('Tambah Data Kelompok', 'success');
        return redirect()->route('kelompok.index');
        //->with('success', 'Tambah Kelompok Kecil Sukses.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $data = Golongan::find($id);
        $data->kelompok = $request->get('kelompokkecil');
        $data->golongan = $request->get('golongan');
        $data->save();

        toast('Tambah Data Kelompok', 'success');
        return redirect()->route('kelompok.index');
        //->with('success', 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        $datax = Golongan::find($id);
        $datax->delete();

        alert()->success('Hapus', 'Hapus Data Perijinan Berhasil.');
        return redirect()->route('kelompok.index');
        // ->with('success', 'Data berhasil dihapus');
    }
}
