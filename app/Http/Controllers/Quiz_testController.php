<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoahoc;
use App\Monhoc;
use App\User;
use App\De;
use App\CauHoi;
use App\Quiz_test;
use App\donggop;
class Quiz_testController extends Controller
{
		function __construct(){
		$DONGGOP = donggop::all();
		view()->share('DONGGOP',$DONGGOP);
	}
	public function getDanhSach(){
    	// hiển thị từ cuối  lên trên đầu
		$quiz_test = Quiz_test::all();

		return view('admin.quiz_test.danhsach',['quiz_test'=>$quiz_test]);
	}

	public function getSua($id){
		$quiz_test = Quiz_test::find($id);
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		$de =De::all();
		$cauhoi = CauHoi::all();
		$user = User::where('quyen','=','1')->get();
		return view('admin.quiz_test.sua',['quiz_test'=>$quiz_test,'user'=>$user,'monhoc'=>$monhoc,'khoahoc'=>$khoahoc,'de'=>$de,'cauhoi'=>$cauhoi]);
	}
	public function postSua(Request $request,$id){
		$quiz_test  = Quiz_test::find($id);

		$quiz_test->monhoc_id = $request->monhoc_id;
		$quiz_test->de_id = $request->de_id;
		$quiz_test->cauhoi_id = $request->cauhoi_id;


		$quiz_test->save();
		$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
		return redirect('admin/quiz_test/sua/'.$id);


	}

	public function getThem(){
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		$de =De::all();
		$cauhoi = CauHoi::all();
		$user = User::where('quyen','=','1')->get();
		return view('admin.quiz_test.them',['khoahoc'=>$khoahoc,'monhoc'=>$monhoc,'user'=>$user,'de'=>$de,'cauhoi'=>$cauhoi]);
	}
	public function postThem(Request $request){

		$quiz_test = new Quiz_test;
		$quiz_test->monhoc_id = $request->monhoc_id;
		$quiz_test->de_id = $request->de_id;
		$quiz_test->cauhoi_id = $request->cauhoi_id;

		$quiz_test->save();
		$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
		return redirect('admin/quiz_test/them');

	}

	public function getXoa(Request $request,$id){
		$quiz_test= Quiz_test::find($id);
		$quiz_test->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('admin/quiz_test/danhsach');
	}
}
