<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function baihoc(){
        return $this->hasMany('App\Baihoc','users_id','id');
    }
    public function cauhoi(){
        return $this->hasMany('App\CauHoi','users_id','id');
    }
    public function de(){
        return $this->hasMany('App\De','users_id','id');
    }
    public function monhoc(){
        return $this->hasMany('App\Monhoc','users_id','id');
    }
    public function comment(){
        return $this->hasMany('App\Comment','users_id','id');
    }
}
