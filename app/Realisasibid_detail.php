<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasibid_detail extends Model
{
    
    protected $table = "zo_realisasibid_detail";
    protected $fillable = ["realisasibid_id","target","real","capaian","keterangan","indicator_id","target_akhir","capaian_akhir"
                            ];
    public function real()
    {
        return $this->belongsTo(Realisasibid::class,'realisasibid_id','id');
    }
    public function indi()
    {
        return $this->belongsTo(Indicator::class,'indicator_id','id');
    }

}
