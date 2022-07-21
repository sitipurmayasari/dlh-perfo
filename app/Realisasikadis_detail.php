<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasikadis_detail extends Model
{
    
    protected $table = "zo_realisasikadis_detail";
    protected $fillable = ["realisasikadis_id","target","real","capaian","keterangan","indicator_id","target_akhir","capaian_akhir"
                            ];
    public function real()
    {
        return $this->belongsTo(Realisasikadis::class,'realisasikadis_id','id');
    }
    public function indi()
    {
        return $this->belongsTo(Indicator::class,'indicator_id','id');
    }

}
