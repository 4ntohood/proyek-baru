<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'T_PERIJINAN_PRINT';
    protected $primarykeys = 'column_id';
    protected $fillable = [
        'tgl', 'no', 'nama', 'halawal', 'halakhir', 'keterangan', 'jenis', 'C_Append', 'C_Edit', 'C_Delete'
    ];
}
