<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealisasiSKPD_detail extends Model
{
    
    protected $table = "zo_realisasiskpd_detail";
    protected $fillable = ["realisasiskpd_id","target","real","capaian","keterangan","kinerja_skpd_id"
                            ];
    public function realisasi()
    {
        return $this->belongsTo(RealisasiSKPD::class,'realisasiskpd_id','id');
    }
    public function indi()
    {
        return $this->belongsTo(Kinerja_SKPD::class,'kinerja_skpd_id','id');
    }

}
