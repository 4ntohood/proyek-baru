<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class KelompokController extends Controller
{

    public function index()
    {
        $datax = Kelompok::paginate(15);
        $datagol = Golongan::All();
        $datagoldistinc = DB::table('T_MST_GOLONGAN')->select('KELOMPOK')->distinct()->get();
        return view('kelompok', compact('datax', 'datagol', 'datagoldistinc'))
            ->with('i', (request()->input('page', 1) - 1) * 10)
            ->with('j', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $tambah = new Kelompok();
        $tambah->kelompok = $request->kelompokbesar;
        $tambah->c_append = $request->ip();
        $tambah->save();

        toast('Tambah Data Kelompok', 'success');
        return redirect()->route('kelompok.index');
        //->with('success', 'Tambah Kelompok Besar Sukses.');
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
        $data = Kelompok::find($id);
        $data->kelompok = $request->get('kelompokbesar');
        $data->save();
        toast('Update Data Perijinan', 'success');
        return redirect()->route('kelompok.index');
        //->with('success', 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        $datax = Kelompok::find($id);
        $datax = Golongan::find($id);
        $datax->delete();
        alert()->success('Hapus', 'Hapus Data Kelompok Berhasil.');
        return redirect()->route('kelompok.index');
        //->with('success', 'Data berhasil dihapus');
    }
}
