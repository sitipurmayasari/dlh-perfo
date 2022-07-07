<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasi_detail extends Model
{
    
    protected $table = "zo_realisasi_detail";
    protected $fillable = ["realisasi_id","target","real","capaian","keterangan","indicator_id","target_akhir","capaian_akhir"
                            ];
    public function real()
    {
        return $this->belongsTo(Realisasi::class,'realisasi_id','id');
    }
    public function indi()
    {
        return $this->belongsTo(Indicator::class,'indicator_id','id');
    }

}
