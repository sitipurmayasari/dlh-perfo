<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kinerja_SKPD extends Model
{
    use SoftDeletes;
    
    protected $table = "zo_kinerja_skpd";
    protected $fillable = ["names","iku","skpd","indicator","bobot"
                            ];
    protected $dates = ['deleted_at'];

}
