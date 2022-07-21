<?php

namespace App;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Targetbid_detail;
use App\Targetsubbid_detail;
use App\Targetkadis_detail;
use App\Target_skpd;
use App\Veribid;
use App\Verisubbid;
use App\Realisasibid;


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

    public function getRenstra3($id, $year,$indi){
        $isi = Targetkadis_detail::where('years',$year)
                                ->where('targetkadis_id',$id)
                                ->where('indicator_id',$indi)
                                ->first();
        return $isi;
    }

    public function getTargetSkpd($id, $year){
        $isi = Target_skpd::where('kinerja_skpd_id',$id)
                            ->where('years',$year)
                                ->orderby('years','desc')
                                ->first();
        return $isi;
    }


    public function getPeriv($id){
        $data = Veribid::where('realisasibid_id',$id)
                        ->first();
        return $data;
    }

    public function getPeriv2($id){
        $data = Verisubbid::where('realisasi_id',$id)
                        ->first();
        return $data;
    }

    public function chartRealisasibid($month,$bidang_id)
    {
       $data = Realisasibid::leftJoin('zo_realisasibid_detail as det', function($join) {
                        $join->on('det.realisasibid_id', '=', 'zo_realisasibid.id');
                    })
                    ->whereYear('dates',date('Y'))
                    ->where('dates',$month)
                    ->where('bidang_id',$bidang_id)   
                    ->avg('det.capaian');
        return $data;
    }

}