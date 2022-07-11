<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skpd extends Model
{
    use SoftDeletes;
    
    protected $table = "zo_skpd";
    protected $fillable = ["name" ];
    protected $dates = ['deleted_at'];

}
