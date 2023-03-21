<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerTa extends Model
{
    use HasFactory;
    protected $table = 'T_PERIJINAN_TANAH';
    protected $primarykey = 'Column_ID';
    protected $casts = ['created_at' => 'datetime:yyyy-mm-dd'];
    protected $fillable = [
        'tgl', 'kode', 'hak', 'tglterbit', 'tglhabis', 'no', 'nama', 'provinsi', 'kota', 'kecamatan', 'desa', 'sutgl', 'suno', 'suluas',  'files', 'pdf', 'pdf_files', 'pengingat', 'keterangan'
    ];

    public function masterserta()
    {
        return $this->belongsTo(MasterSerTa::class, 'kode');
    }
    public function getKeyName()
    {
        return "Column_ID";
    }
}
