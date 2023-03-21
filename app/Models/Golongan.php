<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $table = 'T_MST_GOLONGAN';
    protected $primarykey = 'Column_ID';
    protected $fillable = [
        'kelompok', 'golongan'
    ];
    public $timestamps = false;
    public function getKeyName()
    {
        return "Column_ID";
    }
}
