<?php

namespace App\Http\Controllers;
use  Session;
use Illuminate\Http\Request;
use PDF;
use App\Baihoc;
use App\CauHoi;
use App\De;
use App\Khoahoc;
use App\Monhoc;
use App\Quiz_test;
use App\TraLoi;
use App\User;
use App\donggop;
class HomeController extends Controller
{
    //
	function __construct(){
		$BAIHOC = Baihoc::all();
		$MONHOC = Monhoc::all();
		view()->share('MONHOC',$MONHOC);
		$KHOAHOC =Khoahoc::all();
		view()->share('KHOAHOC',$KHOAHOC);
		// $slide = Slide::all();
		view()->share('BAIHOC',$BAIHOC);
		// view()->share('slide',$slide);

		// if(Auth::check()){
		// 	view()->share('nguoidung',Auth::user());
		// }
	}
	public function download($id,$monhoc_id){
		$de = De::where('monhoc_id',$monhoc_id)->get();
		$baihoc = Baihoc::find($id);
		$bh = Baihoc::where('monhoc_id',$monhoc_id)->get();
		$pdf = PDF::loadView('pages.download',['baihoc'=>$baihoc,'bh'=>$bh,'de'=>$de])->setPaper('a4', 'landscape');;
		// $pdf->setPaper('A4');

		$name = $baihoc->title;
		return $pdf->download(''.$name.'.pdf');

	}
	public function test(){
		
		return view('pages.comment');
	}
	// public function test1(){
	// 	return view('test');

	// }

	public function thich($users_id,$baihoc_id){

	}
}
