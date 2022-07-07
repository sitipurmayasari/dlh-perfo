<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    protected $table = "zo_realisasi";
    protected $fillable = ["targetsubbid_id","years","month","filename","users_id","subbidang_id","dates"
                            ];

    public function target()
    {
        return $this->belongsTo(Targetsubbid::class,'targetsubbid_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function sub()
    {
        return $this->belongsTo(Subbidang::class,'subbidang_id','id');
    }

    public function getFile() 
    {
        return $this->files==null ? 'Tidak Ada File' : asset('images/realsubbid').'/'.$this->id.'/'.$this->files;
    }

}
