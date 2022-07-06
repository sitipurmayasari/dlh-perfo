<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Targetbid_detail extends Model
{
    protected $table = "zo_targetbid_detail";
    protected $fillable = ["targetbid_id","indicator_id","years","percentages","initiative"
                            ];
    protected $dates = ['deleted_at'];

    public function target()
    {
        return $this->belongsTo(Targetbid::class,'targetbid_id','id');
    }

    public function indi()
    {
        return $this->belongsTo(Indicator::class,'indicator_id','id');
    }

}
