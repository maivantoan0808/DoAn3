<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\De;
use App\Khoahoc;
use App\Monhoc;
use App\Baihoc;
use App\User;
use App\donggop;
class DeController extends Controller
{
		function __construct(){
		$DONGGOP = donggop::all();
		view()->share('DONGGOP',$DONGGOP);
	}
	public function getDanhSach(){
    	// hiển thị từ cuối  lên trên đầu
		$de = De::all();

		return view('admin.de.danhsach',['de'=>$de]);
	}

	public function getSua($id){
		$de = De::find($id);
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		$user = User::where('quyen','=','1')->get();
		return view('admin.de.sua',['de'=>$de,'user'=>$user,'monhoc'=>$monhoc,'khoahoc'=>$khoahoc]);
	}
	public function postSua(Request $request,$id){
		$de  = De::find($id);

		$de->title = $request->title;
		$de->users_id = $request->users_id;
		$de->monhoc_id = $request->monhoc_id;

		$de->save();
		$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
		return redirect('admin/de/sua/'.$id);


	}

	public function getThem(){
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		$user = User::where('quyen','=','1')->get();
		return view('admin.de.them',['khoahoc'=>$khoahoc,'monhoc'=>$monhoc,'user'=>$user]);
	}
	public function postThem(Request $request){
		$de = new De;
		$de->monhoc_id = $request->monhoc_id;
		$de->users_id = $request->users_id;
		$de->title = $request->title;

		$de->save();
		$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
		return redirect('admin/de/them');

	}

	public function getXoa(Request $request,$id){
		$de= De::find($id);
		$de->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('admin/de/danhsach');
	}
}
