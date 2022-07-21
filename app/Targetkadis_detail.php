<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Targetkadis_detail extends Model
{
    protected $table = "zo_targetkadis_detail";
    protected $fillable = ["targetkadis_id","indicator_id","years","percentages","initiative"
                            ];
    protected $dates = ['deleted_at'];

    public function target()
    {
        return $this->belongsTo(Targetbid::class,'targetkadis_id','id');
    }

    public function indi()
    {
        return $this->belongsTo(Indicator::class,'indicator_id','id');
    }

}
