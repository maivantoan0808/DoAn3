<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoahoc extends Model
{
    //
	protected $table = "khoahoc";

	public function monhoc(){
		return $this->hasMany('App\Monhoc','id_khoa','id');
	}
	public function baihoc(){
		return $this->hasManyThrough('App\Baihoc','App\Monhoc','id_khoa','monhoc_id','id');
	}
}
