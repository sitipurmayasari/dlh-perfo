<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nip','role','bidang_id','subbidang_id',"pangkat"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function bidang()
    {
        return $this->belongsTo(Bidang::class,'bidang_id','id');
    }

    public function subbid()
    {
        return $this->belongsTo(Subbidang::class,'subbidang_id','id');
    }

    public function isBidSub()
    {
        if($this->role==2 || $this->role==3 || $this->role==5){
            return true;
        }else{
            return false;
        }
    }
}
