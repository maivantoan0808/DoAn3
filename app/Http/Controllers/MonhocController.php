<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoahoc;
use App\Monhoc;
use App\donggop;
use App\User;
class MonhocController extends Controller
{
    //
    	function __construct(){
		$DONGGOP = donggop::all();
		view()->share('DONGGOP',$DONGGOP);
	}
	public function getDanhSach(){
    	// hiển thị từ cuối  lên trên đầu
		$monhoc = Monhoc::all();

		return view('admin.monhoc.danhsach',['monhoc'=>$monhoc]);
	}

	public function getSua($id){
		$monhoc = Monhoc::find($id);
		$user = User::all();
		$khoahoc = Khoahoc::all();
		return view('admin.monhoc.sua',['monhoc'=>$monhoc,'khoahoc'=>$khoahoc,'user'=>$user]);
	}
	public function postSua(Request $request,$id){
		$monhoc  = Monhoc::find($id);
		// $this->validate($request,
		// 	[
		// 		'name' => 'unique:Monhoc,name'
		// 	],
		// 	[
		// 		'name.unique' => 'Tên đã tồn tại'
		// 	]);
    	//$tintuc = new TinTuc;
		$monhoc->name = $request->name;
		$monhoc->id_khoa = $request->Khoahoc;
		$monhoc->gioithieu = $request->gioithieu;
		$monhoc->users_id = $request->users_id;
		$monhoc->money =$request->money;
		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/monhoc/them');
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/monhoc/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}

    		//echo $Hinh;
			$file->move("upload/monhoc",$Hinh);
			
			$monhoc->Hinh = $Hinh;
		}

		$monhoc->save();
		$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
		return redirect('admin/monhoc/sua/'.$id);

	}

	public function getThem(){
		$khoahoc = Khoahoc::all();
		$user = User::all();
		return view('admin.monhoc.them',['khoahoc'=>$khoahoc,'user'=>$user]);
	}
	public function postThem(Request $request){
    	//echo $request->Ten;
		$this->validate($request,
			[
				'name' => 'unique:Monhoc,name'
			],
			[
				'name.unique' => 'Tên đã tồn tại'
			]);
		$monhoc = new Monhoc;
		$monhoc->name = $request->name;
		$monhoc->id_khoa = $request->Khoahoc;
		$monhoc->gioithieu = $request->gioithieu;
		$monhoc->money = $request->money;
		$monhoc->users_id = $request->users_id;
		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/monhoc/them');
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/monhoc/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}
    		//echo $Hinh;
			$file->move("upload/monhoc",$Hinh);
			$monhoc->Hinh = $Hinh;
		}else{
			$monhoc->Hinh="";
		}

		$monhoc->save();
		$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
		return redirect('admin/monhoc/them');

	}

	public function getXoa(Request $request,$id){
		$monhoc= Monhoc::find($id);
		$monhoc->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('admin/monhoc/danhsach');
	}
}
