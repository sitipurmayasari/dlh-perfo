<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kinerja_SKPD extends Model
{
    use SoftDeletes;
    
    protected $table = "zo_kinerja_skpd";
    protected $fillable = ["names","iku","skpd_id","indicator","bobot"
                            ];
    protected $dates = ['deleted_at'];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class,'skpd_id','id');
    }

}
