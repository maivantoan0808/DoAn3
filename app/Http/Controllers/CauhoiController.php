<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoahoc;
use App\Monhoc;
use App\CauHoi;
use App\User;
use App\donggop;
class CauhoiController extends Controller
{
	function __construct(){
		$DONGGOP = donggop::all();
		view()->share('DONGGOP',$DONGGOP);
	}
    //
	public function getDanhSach(){
    	// hiển thị từ cuối  lên trên đầu
		$cauhoi = CauHoi::all();

		return view('admin.cauhoi.danhsach',['cauhoi'=>$cauhoi]);
	}

	public function getSua($id){
		$cauhoi = CauHoi::find($id);
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		$user = User::where('quyen','=','1')->get();
		return view('admin.cauhoi.sua',['cauhoi'=>$cauhoi,'user'=>$user,'monhoc'=>$monhoc,'khoahoc'=>$khoahoc]);
	}
	public function postSua(Request $request,$id){
		$cauhoi  = CauHoi::find($id);

		$cauhoi->monhoc_id = $request->monhoc_id;
		$cauhoi->users_id = $request->users_id;
		$cauhoi->title = $request->title;
		$cauhoi->content = $request->content;
		$cauhoi->A = $request->A;
		$cauhoi->B = $request->B;
		$cauhoi->C = $request->C;
		$cauhoi->D= $request->D;
		$cauhoi->answer = $request->answer;

		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/cauhoi/sua/'.$id);
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/cauhoi/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}

    		//echo $Hinh;

			$file->move("upload/cauhoi",$Hinh);
			
			$cauhoi->Hinh = $Hinh;
		}

		$cauhoi->save();
		$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
		return redirect('admin/cauhoi/sua/'.$id);


	}

	public function getThem(){
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		$user = User::where('quyen','=','1')->get();
		return view('admin.cauhoi.them',['khoahoc'=>$khoahoc,'monhoc'=>$monhoc,'user'=>$user]);
	}
	public function postThem(Request $request){
		$cauhoi = new CauHoi;
		$cauhoi->monhoc_id = $request->monhoc_id;
		$cauhoi->users_id = $request->users_id;
		$cauhoi->title = $request->title;
		$cauhoi->content = $request->content;
		$cauhoi->A = $request->A;
		$cauhoi->B = $request->B;
		$cauhoi->C = $request->C;
		$cauhoi->D= $request->D;
		$cauhoi->answer = $request->answer;
		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/cauhoi/them');
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/cauhoi/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}
    		//echo $Hinh;
			$file->move("upload/cauhoi",$Hinh);
			$cauhoi->Hinh = $Hinh;
		}else{
			$cauhoi->Hinh="";
		}

		$cauhoi->save();
		$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
		return redirect('admin/cauhoi/them');

	}

	public function getXoa(Request $request,$id){
		$cauhoi= CauHoi::find($id);
		$cauhoi->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('admin/cauhoi/danhsach');
	}
}
