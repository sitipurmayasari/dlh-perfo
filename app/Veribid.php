<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veribid extends Model
{
    protected $table = "zo_verisubbid";
    protected $fillable = ["realisasibid_id","perencana_dates","validasi_perencana","catatan_perencana","perencana_id",
                            "sekdis_dates","validasi_sekdis","catatan_sekdis","sekdis_id"
                            ];

    public function real()
    {
        return $this->belongsTo(Realisasibid::class,'realisasibid_id','id');
    }
    
    public function perencana()
    {
        return $this->belongsTo(User::class,'perencana_id','id');
    }

    public function sekdis()
    {
        return $this->belongsTo(User::class,'sekdis_id','id');
    }

}
