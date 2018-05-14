<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoahoc;
use App\donggop;
class KhoahocController extends Controller
{
    //
    	function __construct(){
		$DONGGOP = donggop::all();
		view()->share('DONGGOP',$DONGGOP);
	}
	public function getdanhsach(){
		$khoa = Khoahoc::all();
		return view('admin.khoahoc.danhsach',['khoa'=>$khoa]);
	}
	public function getThem(){
		return view('admin.khoahoc.them');
	}

	public function postThem(Request $request){
		$this->validate($request,
			[
				'name' => 'unique:khoahoc,name'
			],
			[
				'name.unique' =>'Tên khóa học đã tồn tại'

			]);
		$khoa = new Khoahoc;
		$khoa->name = $request->name;
		$khoa->gioithieu = $request->gioithieu;
		$khoa->loai = $request->loai;
		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/khoahoc/them');
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/khoahoc/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}
    		 $Hinh;
			$file->move("upload/khoahoc",$Hinh);
			$khoa->Hinh = $Hinh;
		}else{
			$khoa->Hinh="Dat";
		}
		$khoa->save();
		$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
		return redirect('admin/khoahoc/them');
	}
	public function getSua($id){
		$khoa = Khoahoc::find($id);
		return view('admin.khoahoc.sua',['khoa'=>$khoa]);
	}

	public function postSua(Request $request,$id){
		// $this->validate($request,
		// 	[
		// 		'name' => 'unique:khoahoc,name'
		// 	],
		// 	[
		// 		'name.unique' =>'Tên khóa học đã tồn tại'

		// 	]);
		$khoa = Khoahoc::find($id);
		$khoa->name = $request->name;
		$khoa->gioithieu = $request->gioithieu;
		$khoa->loai = $request->loai;
		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/khoahoc/sua/'.$id);
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/khoahoc/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}

    		//echo $Hinh;
			$file->move("upload/khoahoc",$Hinh);
			
			$khoa->Hinh = $Hinh;
		}
		$khoa->save();
		$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
		return redirect('admin/khoahoc/sua/'.$id);
	}


	// xóa
	public function getXoa(Request $request,$id){
		$khoa = Khoahoc::find($id);
		$khoa->delete();
		$request->session()->flash('thongbao','Xóa thành công!');
		return redirect('admin/khoahoc/danhsach');
	}
}
