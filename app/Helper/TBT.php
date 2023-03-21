<?php

namespace App\Helpers;

class TBT
{
    public static function tbt($date)
    {
        $date = date("Ymd");
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 4, 2);
        $hari = substr($date, 6, 2);
        $tbt = $tahun + $bulan + $hari;
        return $tbt;
    }
}
