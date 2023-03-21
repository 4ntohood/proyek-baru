<?php

namespace App\Http\Controllers;

use App\Models\Perijinan;
use App\Models\Kelompok;
use App\Models\Golongan;
use App\Models\MasterSerTa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Auth;
use Alert;

class PerijinanController extends Controller
{

    public function index(Request $request)
    {
    }
    public function ijin_det(Request $request)
    {
        $kode = $request->kode;
        return view('Ijin_detail.index', compact('kode'));
    }
    public function readijin_detail(Request $request)
    {
        if (session()->has('temp_pdf')) {
            $temp = session('temp_pdf');
            Storage::disk('local')->delete($temp);
        }
        $kode = $request->kdmstr;
        $datax = DB::table('T_PERIJINAN AS A')
            ->select(
                'column_id',
                'periode',
                'tgl',
                'kode',
                'no',
                'nama',
                'nama_ijin',
                'tglterbit',
                'tglhabis',
                'pengingat',
                'penerbit',
                'lokasi',
                'norak',
                'nobox',
                'lampiran',
                'keterangan',
                'files',
                'jml',
                'img',
                'golongan',
                'kelompok',
                'namafile',
                'pdf_files'
            )
            ->where('kode', '=', $kode)
            ->where(function ($query) use ($request) {
                if (isset($request->ftgl) && isset($request->ftgl2)) {
                    $Tgl1 = Carbon::parse($request->input('ftgl'))->toDateString();
                    $Tgl2 = Carbon::parse($request->input('ftgl2'))->toDateString();

                    $query->WhereBetween('A.tgl', [$Tgl1, $Tgl2]);
                }
                if (isset($request->fno)) {
                    $query->where('A.no', 'like', '%' . $request->fno . '%');
                }
                if (isset($request->fnama)) {
                    $query->where('A.nama', 'like', '%' . $request->fnama . '%');
                }
                // if (isset($request->fnama_ijin)) {
                //     $query->where('A.nama_ijin', 'like', '%' . $request->fnama_ijin . '%');
                // }
                if (isset($request->ftglterbit) && isset($request->ftglterbit2)) {
                    $Tglt1 = Carbon::parse($request->input('ftglterbit'))->toDateString();
                    $Tglt2 = Carbon::parse($request->input('ftglterbit2'))->toDateString();
                    $query->WhereBetween('A.tglterbit', [$Tglt1, $Tglt2]);
                }
                if (isset($request->ftglhabis) && isset($request->ftglhabis2)) {
                    $Tglh1 = Carbon::parse($request->input('ftglhabis'))->toDateString();
                    $Tglh2 = Carbon::parse($request->input('ftglhabis2'))->toDateString();
                    $query->WhereBetween('A.tglhabis', [$Tglh1, $Tglh2]);
                }
                if (isset($request->fbox)) {
                    $query->where('A.nobox', '=', $request->fbox);
                }
                if (isset($request->fpenerbit)) {
                    $query->where('A.penerbit', 'like', '%' . $request->fpenerbit . '%');
                }
                if (isset($request->fketerangan)) {
                    $query->where('A.keterangan', 'like', '%' . $request->fketerangan . '%');
                }
            })
            ->orderby('A.tglhabis', 'DESC')
            ->paginate(15);
        return view('Ijin_detail.read_ijin_detail', compact('datax', 'kode'))
            ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    public function create(Request $request)
    {
        $kodemaster = ($request->kdmstr);
        $kelompok = Kelompok::All();
        $golongan = Golongan::All();
        return view('Ijin_detail.create_ijin', compact('kodemaster', 'kelompok', 'golongan'));
    }
    public function edit(Request $request, $id)
    {
        $dt = Perijinan::findorFail($id);
        $kodemaster = $request->kdmstr;
        $kelompok = Kelompok::All();
        $golongan = Golongan::All();
        return view('Ijin_detail.edit_ijin', compact('dt', 'kodemaster', 'kelompok', 'golongan'));
    }
    public function store(Request $request)
    {
        if (file_exists($request->file('files'))) {
            $extension = $request->file('files')->getClientOriginalExtension();
            $namafile = $request->no . '_' . time() . '.' . $extension;
            $jadistring = file_get_contents($request->file('files'));
            $unpack = unpack("H*hex", $jadistring);
            $unpack = '0x' . $unpack['hex'];
            $pdf = DB::raw("CONVERT(VARBINARY(MAX), $unpack)");
        }
        $periode = session('pPeriode');
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

        $user = Auth::user()->username;
        $fulldate = date("Ymd His");
        $rt = $request->ip();
        $who = $fulldate . '|' . $rt . '|' . $user;

        $tambah = new Perijinan;
        $tambah->periode = $periode;
        $tambah->tgl = $tgl;
        $tambah->kode = $kodemst;
        $tambah->no = $request->no;
        $tambah->nama_ijin = $request->nama_ijin;
        $tambah->nama = $request->nama;
        $tambah->tglterbit = $tglterbit;
        $tambah->tglhabis = $tglhabis;
        $tambah->pengingat = $request->pengingat;
        $tambah->nobox = $request->nobox;
        $tambah->penerbit = $request->penerbit;
        $tambah->kelompok = $request->kelompok;
        $tambah->golongan = $request->golongan;
        if (file_exists($request->file('files'))) {
            $tambah->pdf_files = $pdf;
            $tambah->namafile = $namafile;
        }
        $tambah->keterangan = $request->keterangan;
        $tambah->c_append = $who;
        $tambah->save();
        return  redirect()->to($request->last_url)->with('success', 'Add New Successfully');
    }
    public function filterijin(Request $request)
    {
        $kelompok = Kelompok::All();
        $kodemaster =  $request->kdmstr;
        return view('Ijin_detail.filter_ijin', compact('kelompok', 'kodemaster'));
    }

    // public function show($kode)
    // {
    //     $kelompok = Kelompok::All();
    //     $golongan = Golongan::All();
    //     $kodex = MasterSerTa::Where('kode', $kode)->value('kode');
    //     $datax = Perijinan::where('kode', $kode)->get();
    //     $expiredate = date('d-M-Y', strtotime(Carbon::now()));
    //     return view('Ijin.ijin_det', compact('datax', 'kelompok', 'golongan', 'kodex', 'expiredate'))
    //         ->with('i');
    // }
    public function cetak($id)
    {
        $datax = Perijinan::find($id);
        return view('Ijin_detail.cetak_ijin', compact('datax'));
    }
    public function update(Request $request, $id)
    {
        if (file_exists($request->file('files'))) {
            $extension = $request->file('files')->getClientOriginalExtension();
            $namafile = $request->no . '_' . time() . '.' . $extension;
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

        $periode = session('pPeriode');
        $user = Auth::user()->username;
        $fulldate = date("Ymd His");
        $rt = $request->ip();
        $who = $fulldate . '|' . $rt . '|' . $user;

        $data = Perijinan::find($id);
        $data->periode = $periode;
        $data->tgl = $tgl;
        $data->kode = $kodemst;
        $data->no = $request->get('no');
        $data->nama_ijin = $request->get('nama_ijin');
        $data->nama = $request->get('nama');
        $data->tglterbit = $tglterbit;
        $data->tglhabis = $tglhabis;
        $data->pengingat = $request->get('pengingat');
        $data->nobox = $request->get('nobox');
        $data->penerbit = $request->get('penerbit');
        $data->kelompok = $request->get('kelompok');

        $data->golongan = $request->get('golongan');
        if (file_exists($request->file('files'))) {
            $data->pdf_files = $pdf;
            $data->namafile = $namafile;
        }
        $data->keterangan = $request->get('keterangan');
        $data->c_edit = $who;
        $data->save();
        return  redirect()->to($request->last_url)->with('success', 'Post Updated Successfully');
    }

    public function destroy($id)
    {
        $datax = Perijinan::findOrFail($id);
        $datax->delete();
    }
}
