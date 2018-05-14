<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoahoc;
use App\Monhoc;
use App\Baihoc;
use App\User;
use App\De;
use App\CauHoi;
use Illuminate\Support\Facades\Auth; // phải có lớp này mới có thể sử dụng để đăng nhập
class GiaoVienController extends Controller
{
    //
	public function getdanhsachBH(){
		$user_id = Auth::user()->id;
		$baihoc = Baihoc::where('users_id','=',$user_id)->get();
		return view('giaovien.baihoc.danhsach',['baihoc'=>$baihoc]);
	}

	public function getSuaBH($id){
		$baihoc = Baihoc::find($id);
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		return view('giaovien.baihoc.sua',['baihoc'=>$baihoc,'monhoc'=>$monhoc,'khoahoc'=>$khoahoc]);
	}
	public function postSuaBH(Request $request,$id){
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
		$baihoc->monhoc_id = $request->monhoc_id;

		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('giaovien/baihoc/sua/'.$id);
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
		return redirect('giaovien/baihoc/sua/'.$id);


	}

	public function getThemBH(){
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		return view('giaovien.baihoc.them',['khoahoc'=>$khoahoc,'monhoc'=>$monhoc]);
	}
	public function postThemBH(Request $request){
		$this->validate($request,
			[
				'title' => 'unique:Baihoc,title'
			],
			[
				'title.unique' => 'Tiêu đề đã tồn tại'

			]);
		$baihoc = new Baihoc;
		$baihoc->monhoc_id = $request->monhoc_id;
		$baihoc->users_id = Auth::user()->id;
		$baihoc->title = $request->title;
		$baihoc->description = $request->description;
		$baihoc->content = $request->content;
		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('giaovien/baihoc/them');
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
		return redirect('giaovien/baihoc/them');

	}

	public function getXoaBH(Request $request,$id){
		$baihoc= Baihoc::find($id);
		$baihoc->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('giaovien/baihoc/danhsach');
	}


	public function getdanhsachDe(){
		$user_id = Auth::user()->id;
		$de = De::where('users_id',$user_id)->get();

		return view('giaovien.de.danhsach',['de'=>$de]);
	}

	public function getSuaDe($id){
		$de = De::find($id);
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		return view('giaovien.de.sua',['de'=>$de,'monhoc'=>$monhoc,'khoahoc'=>$khoahoc]);
	}
	public function postSuaDe(Request $request,$id){
		$de  = De::find($id);

		$de->title = $request->title;
		$de->monhoc_id = $request->monhoc_id;

		$de->save();
		$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
		return redirect('giaovien/de/sua/'.$id);


	}

	public function getThemDe(){
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		return view('giaovien.de.them',['khoahoc'=>$khoahoc,'monhoc'=>$monhoc]);
	}
	public function postThemDe(Request $request){
		$de = new De;
		$de->monhoc_id = $request->monhoc_id;
		$de->users_id = Auth::user()->id;
		$de->title = $request->title;

		$de->save();
		$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
		return redirect('giaovien/de/them');

	}

	public function getXoaDe(Request $request,$id){
		$de= De::find($id);
		$de->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('giaovien/de/danhsach');
	}

	// Câu hỏi
	public function getDanhSachCH(){
		$user_id = Auth::user()->id;
		$cauhoi = CauHoi::where('users_id',$user_id)->get();

		return view('giaovien.cauhoi.danhsach',['cauhoi'=>$cauhoi]);
	}

	public function getSuaCH($id){
		$cauhoi = CauHoi::find($id);
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		return view('giaovien.cauhoi.sua',['cauhoi'=>$cauhoi,'monhoc'=>$monhoc,'khoahoc'=>$khoahoc]);
	}
	public function postSuaCH(Request $request,$id){
		$cauhoi  = CauHoi::find($id);

		$cauhoi->monhoc_id = $request->monhoc_id;
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
				return redirect('giaovien/cauhoi/sua/'.$id);
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
		return redirect('giaovien/cauhoi/sua/'.$id);


	}

	public function getThemCH(){
		$khoahoc = Khoahoc::all();
		$monhoc = Monhoc::all();
		return view('giaovien.cauhoi.them',['khoahoc'=>$khoahoc,'monhoc'=>$monhoc]);
	}
	public function postThemCH(Request $request){
		$cauhoi = new CauHoi;
		$cauhoi->monhoc_id = $request->monhoc_id;
		$cauhoi->users_id = Auth::user()->id;
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
				return redirect('giaovien/cauhoi/them');
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
		return redirect('giaovien/cauhoi/them');

	}

	public function getXoaCH(Request $request,$id){
		$cauhoi= CauHoi::find($id);
		$cauhoi->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('giaovien/cauhoi/danhsach');
	}

	public function getdanhsachMH(){
		$users_id = Auth::user()->id;
		$monhoc = Monhoc::where('users_id',$users_id)->get();
		return view('giaovien.monhoc.danhsach',['monhoc'=>$monhoc]);
	}

	public function getSuaMH($id){
		$monhoc = Monhoc::find($id);
		$khoahoc = Khoahoc::all();
		return view('giaovien.monhoc.sua',['monhoc'=>$monhoc,'khoahoc'=>$khoahoc]);
	}

	public function postSuaMH(Request $request,$id){
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
		return redirect('giaovien/monhoc/sua/'.$id);

	}

	public function getThemMH(){
		$khoahoc = Khoahoc::all();
		return view('giaovien.monhoc.them',['khoahoc'=>$khoahoc]);
	}
	public function postThemMH(Request $request){
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
		$monhoc->users_id = Auth::user()->id;
		$monhoc->money = $request->money;
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
		return redirect('giaovien/monhoc/them');

	}

	public function getXoaMH(Request $request,$id){
		$monhoc= Monhoc::find($id);
		$monhoc->delete();
		$request->session()->flash('thongbao', 'Xóa thành công!');
		return redirect('giaovien/monhoc/danhsach');
	}

	public function getSua($id){
		$user = User::find($id);
		return view('giaovien.sua',['user'=>$user]);
	}
	public function postSua($id,Request $request){
		$user = User::find($id);
		$user->name = $request->name;
		$user->username = $request->username;
		$user->phone = $request->phone;

		if($request->changePassword == "on"){
			$this->validate($request,
				[
					'password'=>'required|min:3|max:32',
					'passwordAgain' =>'required|same:password'
				],
				[
					'password.required' => 'Bạn chưa nhập mật khẩu',
					'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
					'password.max' => 'Mật khẩu chỉ được phép tối đa 32 kí tự',
					'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
					'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng'
				]);
			$user->password = bcrypt($request->password);
		}
		if($request->hasFile('Hinh')){
			$file = $request ->file('Hinh');
			$duoi = $file->getClientOriginalExtension();
			if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
				$request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
				return redirect('admin/user/sua/'.$id);
			}
			$name = $file->getClientOriginalName();
			$Hinh = str_random(4)."_".$name;
			while(file_exists("upload/user/".$Hinh)){
				$Hinh = str_random(4)."_".$name;
			}

            //echo $Hinh;
			$file->move("upload/user",$Hinh);

			$user->Hinh = $Hinh;
		}
		$user->save();
		$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
		return redirect('giaovien/sua/'.$id);
	}
}
