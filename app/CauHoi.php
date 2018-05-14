<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    //
    protected $table = "cauhoi";
    public function user(){
    	return $this->belongsTo('App\User','users_id','id');
    }
    public function monhoc(){
    	return $this->belongsTo('App\Monhoc','monhoc_id','id');
    }
    public function quiz_test(){
    	return $this->hasMany('App\Quiz_test','cauhoi_id','id');
    }
}
