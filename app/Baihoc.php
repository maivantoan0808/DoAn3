<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baihoc extends Model
{
    //
	protected $table = "baihoc";
	public  function monhoc(){
		return $this->belongsTo('App\Monhoc','monhoc_id','id');
	}
	public function user(){
		return $this->belongsTo('App\User','users_id','id');
	}
	public function comment(){
		return $this->hasMany('App\Comment','baihoc_id','id');
	}
}
