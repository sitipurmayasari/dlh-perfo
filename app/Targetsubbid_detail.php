<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Targetsubbid_detail extends Model
{
    protected $table = "zo_targetsubbid_detail";
    protected $fillable = ["targetsubbid_id","indicator_id","years","percentages","initiative"
                            ];
    protected $dates = ['deleted_at'];

    public function target()
    {
        return $this->belongsTo(Targetsubbid::class,'targetsubbid_id','id');
    }

    public function indi()
    {
        return $this->belongsTo(Indicator::class,'indicator_id','id');
    }
    
}
