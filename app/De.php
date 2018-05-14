<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class De extends Model
{
    //
    protected $table = "de";
    public function user(){
    	return $this->belongsTo('App\User','users_id','id');
    }
    public function quiz_test(){
    	return $this->hasMany('App\Quiz_test','de_id','id');
    }
    public function monhoc(){
    	return $this->belongsTo('App\Monhoc','monhoc_id','id');
    }
    public function comment(){
        return $this->hasMany('App\Comment','de_id','id');
    }
}
