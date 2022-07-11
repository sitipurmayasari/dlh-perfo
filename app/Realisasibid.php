<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasibid extends Model
{
    protected $table = "zo_realisasibid";
    protected $fillable = ["targetbid_id","years","month","filename","users_id","bidang_id","dates"
                            ];

    public function target()
    {
        return $this->belongsTo(Targetbid::class,'targetbid_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class,'bidang_id','id');
    }

    public function getFile() 
    {
        return $this->files==null ? 'Tidak Ada File' : asset('images/realbid').'/'.$this->id.'/'.$this->files;
    }

}
