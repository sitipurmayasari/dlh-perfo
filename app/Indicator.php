<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indicator extends Model
{
    use SoftDeletes;
    
    protected $table = "zo_indicator";
    protected $fillable = ["kinerja_id","names"
                        ];
    protected $dates = ['deleted_at'];

    public function kinerja()
    {
        return $this->belongsTo(Kinerja::class,'kinerja_id','id');
    }

}
