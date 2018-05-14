<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    //
	protected $table = "monhoc";
	public  function baihoc(){
		return $this->hasMany('App\Baihoc','monhoc_id','id');
	}
	public function khoahoc(){
		return $this->belongsTo('App\Khoahoc','id_khoa','id');
	}
	public function quiz_test(){
		return $this->hasMany('App\Quiz_test','monhoc_id','id');
	}
	public function de(){
		return $this->hasMany('App\De','monhoc_id','id');
	}
	public function cauhoi(){
		return $this->hasMany('App\CauHoi','monhoc_id','id');
	}
	public function user(){
		return $this->belongsTo('App\User','users_id','id');
	}
}
