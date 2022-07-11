<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealisasiSKPD extends Model
{
    protected $table = "zo_realisasiskpd";
    protected $fillable = ["skpd_id","years","month","filename","users_id","bidang_id","dates"
                            ];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class,'skpd_id','id');
    }

}
