<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSerTa extends Model
{
    use HasFactory;
    protected $table = 'T_MST_PERUSAHAAN';
    protected $primarykey = 'column_id';
    protected $fillable = [
        'kode', 'nama', 'jenis', 'keterangan', 'C_Append'
    ];
    public $timestamps = false;
    public function serta()
    {
        return $this->hasMany('App\Models\SerTa');
    }
    public function getKeyName()
    {
        return "column_id";
    }
}
