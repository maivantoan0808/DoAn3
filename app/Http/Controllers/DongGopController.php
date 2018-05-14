<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donggop;
class DongGopController extends Controller
{
    //
	function __construct(){
		$DONGGOP = donggop::all();
		view()->share('DONGGOP',$DONGGOP);
	}

	public function danhsach(){
		$donggop = donggop::all();
		return view('admin.donggop.danhsach',['donggop'=>$donggop]);
	}
	public function xem($id){
		$donggop = donggop::find($id);
		$donggop->status = "Đã xem";
		$donggop->save();
		return view('admin.donggop.xem',['donggop'=>$donggop]);
	}
}
