<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Targetkadis extends Model
{
    use SoftDeletes;
    protected $table = "zo_targetkadis";
    protected $fillable = ["dates","yearfrom","yearto","filename","users_id"
                            ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }


}
