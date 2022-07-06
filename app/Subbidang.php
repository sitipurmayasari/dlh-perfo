<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subbidang extends Model
{
    protected $table = "zo_subbidang";
    protected $fillable = ["bidang_id","name"];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class,'bidang_id','id');
    }
}