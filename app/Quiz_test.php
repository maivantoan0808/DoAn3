<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz_test extends Model
{
    //
    protected $table = "quiz_test";
    public function monhoc(){
    	return $this->belongsTo('App\Monhoc','monhoc_id','id');
    }
    public function de(){
    	return $this->belongsTo('App\De','de_id','id');
    }
    public function cauhoi(){
    	return $this->belongsTo('App\CauHoi','cauhoi_id','id');
    }
}
