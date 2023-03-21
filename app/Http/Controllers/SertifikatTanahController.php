<?php

namespace App\Http\Controllers;

use App\Models\MasterSerTa;
use Illuminate\Http\Request;
use App\Models\SerTa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Auth;

class SertifikatTanahController extends Controller
{

    public function index()
    {
    }
    public function serta_det(Request $request)
    {
        $kode = $request->kode;
        return view('SerTa_detail.index', compact('kode'));
    }
    public function readserta_detail(Request $request)
    {
        if (session()->has('temp_pdf')) {
            $temp = session('temp_pdf');
            Storage::disk('local')->delete($temp);
        }
        $kode = $request->kdmstr;
        $datax = DB::table('T_PERIJINAN_TANAH AS A')
            ->select(
                'COLUMN_ID',
                'TGL',
                'KODE',
                'HAK',
                'TGLTERBIT',
                'TGLHABIS',
                'NO',
                'NAMA',
                'PROVINSI',
                'KOTA',
                'KECAMATAN',
                'DESA',
                'SUTGL',
                'SUNO',
                'SULUAS',
                'FILES',
                'PDF',
                'PDF_FILES',
                'PENGINGAT',
                'KETERANGAN'
            )
            ->where('KODE', '=', $kode)
            ->where(function ($query) use ($request) {
                if (isset($request->ftgl) && isset($request->ftgl2)) {
                    $Tgl1 = Carbon::parse($request->input('ftgl'))->toDateString();
                    $Tgl2 = Carbon::parse($request->input('ftgl2'))->toDateString();

                    $query->WhereBetween('A.TGL', [$Tgl1, $Tgl2]);
                }
                if (isset($request->ftglterbit) && isset($request->ftglterbit2)) {
                    $Tglt1 = Carbon::parse($request->input('ftglterbit'))->toDateString();
                    $Tglt2 = Carbon::parse($request->input('ftglterbit2'))->toDateString();
                    $query->WhereBetween('A.TGLTERBIT', [$Tglt1, $Tglt2]);
                }
                if (isset($request->ftglhabis) && isset($request->ftglhabis2)) {
                    $Tglh1 = Carbon::parse($request->input('ftglhabis'))->toDateString();
                    $Tglh2 = Carbon::parse($request->input('ftglhabis2'))->toDateString();
                    $query->WhereBetween('A.TGLHABIS', [$Tglh1, $Tglh2]);
                }
                if (isset($request->fno)) {
                    $query->where('A.NO', 'like', '%' . $request->fno . '%');
                }
                if (isset($request->fnama)) {
                    $query->where('A.NAMA', 'like', '%' . $request->fnama . '%');
                }
                if (isset($request->fprovinsi)) {
                    $query->where('A.PROVINSI', 'like', '%' . $request->fprovinsi . '%');
                }
                if (isset($request->fkota)) {
                    $query->where('A.KOTA', 'like', '%' . $request->fkota . '%');
                }
                if (isset($request->fkecamatan)) {
                    $query->where('A.KECAMATAN', 'like', '%' . $request->fkecamatan . '%');
                }
                if (isset($request->fdesa)) {
                    $query->where('A.DESA', 'like', '%' . $request->fdesa . '%');
                }
                if (isset($request->ftglsu) && isset($request->ftglsu2)) {
                    $Tgl1 = Carbon::parse($request->input('ftglsu'))->toDateString();
                    $Tgl2 = Carbon::parse($request->input('ftglsu2'))->toDateString();
                    $query->WhereBetween('A.TGLHABIS', [$Tgl1, $Tgl2]);
                }
                if (isset($request->fsuno)) {
                    $query->where('A.SUNO', '=', $request->fsuno);
                }
                if (isset($request->fsuluas)) {
                    $query->where('A.SULUAS', 'like', '%' . $request->fsuluas . '%');
                }
                if (isset($request->fketerangan)) {
                    $query->where('A.KETRANGAN', 'like', '%' . $request->fketerangan . '%');
                }
            })
            ->orderby('A.TGLHABIS', 'DESC')
            ->paginate(15);

        return view('SerTa_detail.read_serta_detail', compact('datax', 'kode'))
            ->with('i');
    }
    public function filterserta(Request $request)
    {
        $kodemaster =  $request->kdmstr;
        return view('SerTa_detail.filter_serta', compact('kodemaster'));
    }
    // public function show($kode)
    // {
    //     $kodex = MasterSerTa::where('kode', $kode)->get();
    //     $kd = $kodex->pluck("kode");
    //     $datax = SerTa::where('KODE', $kode)->get();
    //     $expiredate = Carbon::now()->addDays(90);
    //     return view('SerTa.serta', compact('datax', 'kodex', 'expiredate', 'kd'))
    //         ->with('i');
    // }
    public function edit($id)
    {
        $data = SerTa::findOrFail($id);
        $kodemaster = $data->pluck('kode')->first();
        return view('SerTa_detail.edit_serta', compact('data', 'kodemaster'));
    }

    public function create(Request $request)
    {
        $kodemaster = ($request->kdmstr);
        return view('SerTa_detail.create_serta', compact('kodemaster'));
    }

    public function cetak($id)
    {
        $datax = SerTa::findOrFail($id);
        return view('SerTa_detail.cetak_serta', compact('datax'));
    }
    public function store(Request $request)
    {

        /*-----Simpan di Folder Public Storage---------
         *    if ($request->hasFile('files')) {
         *      $filenameWithExt = $request->file('files')->getClientOriginalName();
         *      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         *      $extension = $request->file('files')->getClientOriginalExtension();
         *      $filenameSimpan = $filename . '_' . time() . '.' . $extension;
         *       $path = $request->file('files')->storeAs('public/pdf_files', $filenameSimpan);
         *   } else {
         *       $filenameSimpan = 'nopdf_file.pdf';
         *  }
         */
        if (file_exists($request->file('files'))) {
            $extension = $request->file('files')->getClientOriginalExtension();
            $namafile = $request->no . '_' . time() . '.' . $extension;
            $jadistring = file_get_contents($request->file('files'));
            $unpack = unpack("H*hex", $jadistring);
            $unpack = '0x' . $unpack['hex'];
            $pdf = DB::raw("CONVERT(VARBINARY(MAX), $unpack)");
        }
        $periode = session('pPeriode');
        $kodemst = $request->input('kodemaster');

        /** Konversi tanggal dari nvarchar ke datetime pake Carbon */

        if (empty($request->tgl)) {
            $tgl = null;
        } else {
            $tgl = Carbon::parse($request->tgl)->toDateString();
        }

        if (empty($request->tglterbit)) {
            $tglterbit = null;
        } else {
            $tglterbit = Carbon::parse($request->tglterbit)->toDateString();
        }

        if (empty($request->tglhabis)) {
            $tglhabis = null;
        } else {
            $tglhabis = Carbon::parse($request->tglhabis)->toDateString();
        }

        if (empty($request->sutgl)) {
            $sutgl = null;
        } else {
            $sutgl = Carbon::parse($request->sutgl)->toDateString();
        }

        $user = Auth::user()->username;
        $fulldate = date("Ymd His");
        $rt = $request->ip();
        $who = $fulldate . '|' . $rt . '|' . $user;

        $tambah = new SerTa;
        $tambah->periode = $periode;
        $tambah->tgl = $tgl;
        $tambah->kode = $kodemst;
        $tambah->no = $request->no;
        $tambah->provinsi = $request->provinsi;
        $tambah->kota = $request->kota;
        $tambah->kecamatan = $request->kecamatan;
        $tambah->desa = $request->desa;
        $tambah->hak = $request->hak;
        $tambah->nama = $request->nama;
        $tambah->sutgl = $sutgl;
        $tambah->suno = $request->suno;
        $tambah->suluas = $request->suluas;
        $tambah->tglterbit = $tglterbit;
        $tambah->tglhabis = $tglhabis;
        if (file_exists($request->file('files'))) {
            $tambah->files = $namafile;
            $tambah->pdf_files = $pdf;
        }
        $tambah->keterangan = $request->keterangan;
        $tambah->c_append = $who;
        $tambah->save();

        return  redirect()->to($request->last_url)->with('success', 'Add New Successfully');
    }

    public function update(Request $request, $id)
    {

        if (file_exists($request->file('files'))) {
            $namafiles = $request->file('files')->getClientOriginalName();
            $jadistring = file_get_contents($request->file('files'));
            $unpack = unpack("H*hex", $jadistring);
            $unpack = '0x' . $unpack['hex'];
            $pdf = DB::raw("CONVERT(VARBINARY(MAX), $unpack)");
        }
        $kodemst = $request->input('kodemaster2');

        if (empty($request->tgl)) {

            $tgl = null;
        } else {
            $tgl = Carbon::parse($request->tgl)->toDateString();
        }

        if (empty($request->tglterbit)) {
            $tglterbit = null;
        } else {
            $tglterbit = Carbon::parse($request->tglterbit)->toDateString();
        }

        if (empty($request->tglhabis)) {
            $tglhabis = null;
        } else {
            $tglhabis = Carbon::parse($request->tglhabis)->toDateString();
        }

        if (empty($request->sutgl)) {
            $sutgl = null;
        } else {
            $sutgl = Carbon::parse($request->sutgl)->toDateString();
        }

        $data = SerTa::find($id);
        $data->tgl = $tgl;
        $data->no = $request->get('no');
        $data->provinsi = $request->get('provinsi');
        $data->kota = $request->get('kota');
        $data->kecamatan = $request->get('kecamatan');
        $data->desa = $request->get('desa');
        $data->hak = $request->get('hak');
        $data->nama = $request->get('nama');
        $data->sutgl = $sutgl;
        $data->suno = $request->get('suno');
        $data->suluas = $request->get('suluas');
        $data->jml = $request->get('jml');
        $data->keterangan = $request->get('keterangan');
        if (file_exists($request->file('files'))) {
            $data->pdf_files = $pdf;
            $data->files = $namafiles;
        }
        $data->tglterbit = $tglterbit;
        $data->tglhabis = $tglhabis;
        $data->save();

        return  redirect()->to($request->last_url)->with('success', 'Post Updated Successfully');
    }


    public function destroy($id)
    {
        $datax = SerTa::findorFail($id);
        $datax->delete();
    }
}
