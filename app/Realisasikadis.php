<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasikadis extends Model
{
    protected $table = "zo_realisasikadis";
    protected $fillable = ["targetkadis_id","years","month","filename","users_id","dates","files"
                            ];

    public function target()
    {
        return $this->belongsTo(Targetsubbid::class,'targetsubbid_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function getFile() 
    {
        return $this->files==null ? 'Tidak Ada File' : asset('images/realkadis').'/'.$this->id.'/'.$this->files;
    }

}
