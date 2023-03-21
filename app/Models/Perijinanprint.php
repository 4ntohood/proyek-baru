<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perijinanprint extends Model
{
    use HasFactory;
    protected $table = 'T_PERIJINAN_PRINT';
    protected $primarykey = 'column_id';
    protected $fillable = [
        'periode', 'tgl', 'kode', 'no', 'nama', 'keterangan', 'jenis'
    ];
    public $timestamps = false;
    public function getKeyName()
    {
        return "column_id";
    }
}
