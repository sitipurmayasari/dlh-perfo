<?php

namespace App;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Targetbid;
use App\Verisubbid;


class InjectQuery
{
//--------------------------------------------Renstra------------------------------------------------------------------
    public function getRenstra($id, $year,$indi){
        $isi = Targetbid_detail::where('years',$year)
                                ->where('targetbid_id',$id)
                                ->where('indicator_id',$indi)
                                ->first();
        return $isi;
    }

    public function getRenstra2($id, $year,$indi){
        $isi = Targetsubbid_detail::where('years',$year)
                                ->where('targetsubbid_id',$id)
                                ->where('indicator_id',$indi)
                                ->first();
        return $isi;
    }

    public function getPeriv($id){
        $data = Verisubbid::where('realisasi_id',$id)
                        ->first();
        return $data;
    }

}