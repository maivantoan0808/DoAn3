<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $table = "comment";

	public function baihoc(){
		return $this->belongsTo('App\Baihoc','baihoc_id','id');
	}

	public function user(){
		return $this->belongsTo('App\User','users_id','id');
	}
	public function de(){
		return $this->belongsTo('App\De','de_id','id');
	}
}
