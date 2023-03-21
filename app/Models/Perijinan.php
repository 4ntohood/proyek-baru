<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perijinan extends Model
{
    use HasFactory;
    protected $table = 'T_PERIJINAN';
    protected $primarykey = 'column_id';
    protected $fillable = [
        'periode', 'tgl', 'kode', 'no', 'nama', 'nama_ijin', 'tglterbit', 'tglhabis', 'pengingat', 'penerbit', 'lokasi',
        'norak', 'nobox', 'lampiran', 'keterangan', 'files', 'jml', 'img', 'golongan', 'kelompok', 'namafile', 'pdf_files'
    ];
    public $timestamps = false;
    public function getKeyName()
    {
        return "column_id";
    }
}
