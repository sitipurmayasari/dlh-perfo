<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target_skpd extends Model
{
    protected $table = "zo_target_skpd";
    protected $fillable = ["kinerja_skpd_id","years","percentages","initiative"
                            ];
    protected $dates = ['deleted_at'];

    public function kinerja()
    {
        return $this->belongsTo(Kinerja_SKPD::class,'kinerja_skpd_id','id');
    }

}
