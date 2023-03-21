<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;
    protected $table = 'T_MST_KELOMPOK';
    protected $primarykey = 'Column_ID';

    protected $fillable = [
        'kelompok'
    ];
    public $timestamps = false;
    public function getKeyName()
    {
        return "Column_ID";
    }
}
