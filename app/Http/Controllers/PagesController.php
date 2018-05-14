<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baihoc;
use App\CauHoi;
use App\De;
use App\Khoahoc;
use App\Monhoc;
use App\Quiz_test;
use App\TraLoi;
use App\User;
use App\donggop;
use App\thecao;
use App\Buy;
use Illuminate\Support\Facades\Auth; // phải có lớp này mới có thể sử dụng để đăng nhập

class PagesController extends Controller
{
    //
	function __construct(){
		$BAIHOC = Baihoc::all();
		$MONHOC = Monhoc::all();
		$THECAO =thecao::all();
		$BUY = Buy::all();
		view()->share('BUY',$BUY);
		view()->share('THECAO',$THECAO);
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

	public function getLogin(){
		return view('login');
	}
	public function postLogin(Request $request){
		$this->validate($request,
			[
				'password'=>'min:3|max:32'
			],
			[
				'password.min' => 'Password không được nhỏ hơn 3 kí tự',
				'password.max' =>'Password không được lớn hơn 32 kí tự'
			]);
		$email = $request->email;
		$pass =$request->password;

		$data = ['email'=>$request->email,'password'=>$request->password,'quyen'=>'0'];
		$data1 = ['email'=>$request->email,'password'=>$request->password,'quyen'=>'1'];
		$data2 = ['email'=>$request->email,'password'=>$request->password,'quyen'=>'2'];
		if(Auth::attempt($data)){
			return redirect('trangchu');
		}else if(Auth::attempt($data1)){
			return redirect('giaovien/baihoc/danhsach');
		}else if(Auth::attempt($data2)){
			return redirect('admin/user/danhsach');
		}else{
			$request->session()->flash('loi', 'Đăng nhập thất bại');
			return redirect('login');
		}
	}

	public function postdangnhap($khoahoc_id,Request $request){
		$khoahoc = Khoahoc::find($khoahoc_id);
		$this->validate($request,
			[
				'email' =>'required',
				'password'=>'required|min:3|max:32'
			],
			[
				'email.required' => 'Bạn chưa nhập email',
				'password.required' => 'Bạn chưa nhập password',
				'password.min' => 'Password không được nhỏ hơn 3 kí tự',
				'password.max' =>'Password không được lớn hơn 32 kí tự'
			]);
		$data = ['email'=>$request->email,'password'=>$request->password,'quyen'=>0];
        // kiểm tra đăng nhập
		if(Auth::attempt($data)){
			$request->session()->flash('thongbao', 'Đăng nhập thành công');
			return redirect('monhoc/'.$khoahoc_id.'');
		}else{
			$request->session()->flash('loi', 'Sai email hoặc mật khẩu');
			return redirect('monhoc/'.$khoahoc_id.'');
		}
	}

	public function postnapthe($khoahoc_id, Request $request,$users_id){
		$khoahoc = Khoahoc::find($khoahoc_id);
		$user = User::find($users_id);
		$buy = new Buy;
		$kh = thecao::all();
		foreach ($kh as $k) {
			if(($k->mathe==$request->mathe) &&($k->seri == $request->seri) && ($k->loaithe==$request->loaithe) && ($k->status==0)){
				$user->money += 200000;
				$user->save();
				$k->status = 1;
				$k->save();
				$request->session()->flash('thongbao1', 'Bạn đã nạp tiền thành công');
				return redirect('monhoc/'.$khoahoc_id.'');
			}
			if(($k->mathe==$request->mathe) &&($k->seri == $request->seri) && ($k->loaithe==$request->loaithe) && ($k->status==1)){
				$request->session()->flash('loi1', 'Thẻ đã được sử dụng');
				return redirect('monhoc/'.$khoahoc_id.'');
			}
		}
		$request->session()->flash('loi1', 'Mã thẻ hoặc seri hoặc tên nhà mạng không chính xác');
		return redirect('monhoc/'.$khoahoc_id.'');
	}

	public function getthanhtoan($users_id,$monhoc_id,$khoahoc_id){
		$buy = new Buy;
		$buy->users_id = $users_id;
		$buy->monhoc_id = $monhoc_id;
		$buy->save();
		$monhhoc = Monhoc::find($monhoc_id);
		$gv = User::find($monhhoc->users_id);
		$sinhvien = User::find($users_id);
		$khoahoc = Khoahoc::find($khoahoc_id);
		$monhocduocthanhtoan = Monhoc::find($monhoc_id);
		$sinhvien->money = $sinhvien->money - $monhocduocthanhtoan->money;
		$gv->money = $gv->money + $monhocduocthanhtoan->money;
		$gv->save();
		$sinhvien->save();
		return redirect('monhoc/'.$khoahoc_id.'');
	}

	function logout(){
		Auth::logout();
		return redirect('trangchu');
	}
	function logoutHocSinh(){
		Auth::logout();
		return redirect('trangchu');
	}
	function test(){
		return view('test');
	}
	public function getTrangchu(){
		$khoahoc = Khoahoc::all();
		return view('pages.trangchu',['khoahoc'=>$khoahoc]);
	}

	public function monhoc($id){
		$khoahoc = Khoahoc::find($id);
		$monhoc = Monhoc::where('id_khoa',$id)->get();
		return view('pages.monhoc',['monhoc'=>$monhoc,'khoahoc'=>$khoahoc]);
	}

	public function danhsachbaihoc($id){
		$monhoc = Monhoc::find($id);
		$baihoc = Baihoc::where('monhoc_id',$id)->get();
		$de = De::where('monhoc_id',$id)->get();
		return view('pages.danhsachbaihoc',['monhoc'=>$monhoc,'baihoc'=>$baihoc,'de'=>$de]);
	}

	public function baihoc($id,$monhoc_id){
		$de = De::where('monhoc_id',$monhoc_id)->get();
		$baihoc = Baihoc::find($id);
		$bh = Baihoc::where('monhoc_id',$monhoc_id)->get();
		return view('pages.baihoc',['baihoc'=>$baihoc,'bh'=>$bh,'de'=>$de]);
	}

	public function getdethi($id){
		$dethi = De::find($id);
		$baihoc = Baihoc::where('monhoc_id',$dethi->monhoc_id)->get();
		$de = De::where('monhoc_id',$dethi->monhoc_id)->get();
		$quiz_test = Quiz_test::where('de_id',$dethi->id)->get();
		return view('pages.dethi',['dethi'=>$dethi,'baihoc'=>$baihoc,'de'=>$de,'quiz_test'=>$quiz_test]);
	}

	public function postdethi(Request $request,$monhoc_id,$de_id){
		$quiz_test = Quiz_test::where('de_id',$de_id)->get();
		
		foreach ($quiz_test as $qt) {
			# code...
			$traloi = new TraLoi;
			$val = $qt->cauhoi->id;
			$traloi->anser  =  $request->$val;
			$traloi->cauhoi = $qt->cauhoi->id;
			$traloi->save();
		}
		$tl = Traloi::all();
		$deTHI = De::find($de_id);
		//return view('pages.dethi',['tl'=>$tl,'deTHI'=>$deTHI]);

	}

	public function giangvien(){
		$user = User::where('quyen','1')->get();
		return view('pages.giangvien',['user'=>$user]);
	}

	public function getlienhe(){
		return view('pages.lienhe');
	}
	public function postlienhe(Request $request){
		$dg = new donggop;
		$dg->fname = $request->fname;
		$dg->lname = $request->lname;
		$dg->email = $request->email;
		$dg->content = $request->content;
		$dg->status = "Chưa xem";
		$dg->save();

		$request->session()->flash('thongbao', 'Đã đóng góp ý kiến');
		return redirect('lienhe');

	}

	public function thongtincanhan($id){
		$user = User::find($id);
		return view('pages.thongtincanhan',['user'=>$user]);
	}
	public function postthongtincanhan(Request $request,$id){
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
				return redirect('thongtincanhan/'.$id);
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
		$request->session()->flash('thongbao', 'Cập nhật thông tin thành công!');
		return redirect('thongtincanhan/'.$id);

	}

	public function getnaptien($users_id){
		$thecao = thecao::all();
		$user = User::find($users_id);
		return view('pages.naptien',['user'=>$user,'thecao'=>$thecao]);
	}
	public function postnaptien($users_id,Request $request){
		$user = User::find($users_id);
		$kh = thecao::all();
		foreach ($kh as $k) {
			if(($k->mathe==$request->mathe) &&($k->seri == $request->seri) && ($k->loaithe==$request->loaithe) && ($k->status==0)){
				$user->money += 200000;
				$user->save();
				$k->status = 1;
				$k->save();
				$request->session()->flash('thongbao', 'Bạn đã nạp tiền thành công');
				return redirect('naptien/'.$users_id.'');
			}
			if(($k->mathe==$request->mathe) &&($k->seri == $request->seri) && ($k->loaithe==$request->loaithe) && ($k->status==1)){
				$request->session()->flash('loi', 'Thẻ đã được sử dụng');
				return redirect('naptien/'.$users_id.'');
			}
		}
		$request->session()->flash('loi', 'Mã thẻ hoặc seri hoặc tên nhà mạng không chính xác');
		return redirect('naptien/'.$users_id.'');
	}

	public function postDangky(Request $request){
		$this->validate($request,
			[
				'name' => 'min:3',
				'email' => 'email|unique:users,email',
				'password'=>'required|min:3|max:32',
				'passwordAgain' =>'required|same:password'
			],
			[
				'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
				'email.email' =>'Bạn chưa nhập đúng định dạng email',
				'email.unique' =>'Email đã tồn tại',
				'password.required' => 'Bạn chưa nhập mật khẩu',
				'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
				'password.max' => 'Mật khẩu chỉ được phép tối đa 32 kí tự',
				'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
				'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng'
			]);
		$user = new User;
		$user->username = $request->username;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->quyen = "0";
		$user->phone ="";
		$user->money = 0;
		$user->password = bcrypt($request->password);


		$user->save();
		$request->session()->flash('thongbao', 'Bạn đã đăng ký thành công!');
		$data = ['email'=>$request->email,'password'=>$request->password,'quyen'=>'0'];
		if(Auth::attempt($data)){
			return redirect('trangchu');
		}
		
		// $khoahoc = Khoahoc::all();
		// return view('pages.trangchu',['khoahoc'=>$khoahoc]);
	}

	public function dangnhap(Request $request){
		$email = $request->email;
		$pass =$request->password;

		$data = ['email'=>$request->email,'password'=>$request->password,'quyen'=>'0'];
		$data1 = ['email'=>$request->email,'password'=>$request->password,'quyen'=>'1'];
		$data2 = ['email'=>$request->email,'password'=>$request->password,'quyen'=>'2'];
		if(Auth::attempt($data)){
			return redirect('trangchu');
		}else if(Auth::attempt($data1)){
			return redirect('giaovien/monhoc/danhsach');
		}else if(Auth::attempt($data2)){
			return redirect('admin/user/danhsach');
		}else{
			$request->session()->flash('loi1', 'Sai thông tin mật khẩu hoặc email');
			return redirect('trangchu');
		}
	}
}
