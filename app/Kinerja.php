<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kinerja extends Model
{
    use SoftDeletes;
    
    protected $table = "zo_kinerja";
    protected $fillable = ["names","owned","bidang_id","subbidang_id","iku"
                            ];
    protected $dates = ['deleted_at'];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class,'bidang_id','id');
    }

    public function subbid()
    {
        return $this->belongsTo(Subbidang::class,'subbidang_id','id');
    }

}
