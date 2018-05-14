<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoahoc;
use App\Monhoc;
use App\Baihoc;
use App\User;
use App\donggop;
class BaihocController extends Controller
{
		function __construct(){
		$DONGGOP = donggop::all();
		view()->share('DONGGOP',$DONGGOP);
	}
    //
	public function getDanhSach(){
    	// hiển thị từ cuối  lên trên đầu
		$baihoc = Baihoc::all();

		return view('admin.baihoc.danhsach',['baihoc'=>$baihoc]);
	}

	public function getSua($id){
		$baihoc = Baihoc::find($id);
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		$user = User::where('quyen','=','1')->get();
		return view('admin.baihoc.sua',['baihoc'=>$baihoc,'user'=>$user,'monhoc'=>$monhoc,'khoahoc'=>$khoahoc]);
	}
	public function postSua(Request $request,$id){
		$baihoc  = Baihoc::find($id);
		$this->validate($request,
			[
				'title' => 'unique:Baihoc,title|min:3|max:100'
			],
			[
				'title.unique' => 'Tiêu đề đã tồn tại',
				'title.min' => 'Tên tiêu đề  phải có độ dài từ 3 đến 100 ký tự.',
				'title.max' => 'Tên tiêu đề phải có độ dài từ 3 đến 100 ký tự.'

			]);

		$baihoc->title = $request->title;
		$baihoc->description = $request->description;
		$baihoc->content = $request->content;
		$baihoc->users_id = $request->users_id;
		$baihoc->monhoc_id = $request->monhoc_id;

		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/baihoc/sua/'.$id);
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/baihoc/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}

    		//echo $Hinh;
			$file->move("upload/baihoc",$Hinh);
			
			$baihoc->Hinh = $Hinh;
		}

		$baihoc->save();
		$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
		return redirect('admin/baihoc/sua/'.$id);


	}

	public function getThem(){
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		$user = User::where('quyen','=','1')->get();
		return view('admin.baihoc.them',['khoahoc'=>$khoahoc,'monhoc'=>$monhoc,'user'=>$user]);
	}
	public function postThem(Request $request){
		$this->validate($request,
			[
				'title' => 'unique:Baihoc,title'
			],
			[
				'title.unique' => 'Tiêu đề đã tồn tại'

			]);
		$baihoc = new Baihoc;
		$baihoc->monhoc_id = $request->monhoc_id;
		$baihoc->users_id = $request->users_id;
		$baihoc->title = $request->title;
		$baihoc->description = $request->description;
		$baihoc->content = $request->content;
		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/baihoc/them');
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/baihoc/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}
    		//echo $Hinh;
			$file->move("upload/baihoc",$Hinh);
			$baihoc->Hinh = $Hinh;
		}else{
			$baihoc->Hinh="";
		}

		$baihoc->save();
		$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
		return redirect('admin/baihoc/them');

	}

	public function getXoa(Request $request,$id){
		$baihoc= Baihoc::find($id);
		$baihoc->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('admin/baihoc/danhsach');
	}
}
