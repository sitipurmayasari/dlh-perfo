<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verisubbid extends Model
{
    protected $table = "zo_verisubbid";
    protected $fillable = ["realisasi_id","kabid_dates","verifikasi_kabid","catatan_kabid","kabid_id",
                            "perencana_dates","validasi_perencana","catatan_perencana","perencana_id",
                            "sekdis_dates","validasi_sekdis","catatan_sekdis","sekdis_id"
                            ];

    public function real()
    {
        return $this->belongsTo(Realisasi::class,'realisasi_id','id');
    }
    
    public function kabid()
    {
        return $this->belongsTo(User::class,'kabid_id','id');
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
