<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skpd extends Model
{
    use SoftDeletes;
    
    protected $table = "zo_skpd";
    protected $fillable = ["name","t2021","t2022","t2023","t2024","t2025","t2026" ];
    protected $dates = ['deleted_at'];

}
