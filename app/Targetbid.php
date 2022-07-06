<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Targetbid extends Model
{
    use SoftDeletes;
    protected $table = "zo_targetbid";
    protected $fillable = ["dates","yearfrom","yearto","types","filename","sk_number",'users_id',"bidang_id"
                            ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class,'bidang_id','id');
    }

}
