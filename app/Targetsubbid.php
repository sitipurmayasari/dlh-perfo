<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Targetsubbid extends Model
{
    use SoftDeletes;
    protected $table = "zo_targetsubbid";
    protected $fillable = ["dates","yearfrom","yearto","types","filename","sk_number",'users_id',"subbidang_id"
                            ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function sub()
    {
        return $this->belongsTo(Subbidang::class,'subbidang_id','id');
    }

}
