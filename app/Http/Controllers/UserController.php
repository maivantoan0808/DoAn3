<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\donggop;
class UserController extends Controller
{
    //
    function __construct(){
    $DONGGOP = donggop::all();
    view()->share('DONGGOP',$DONGGOP);
  }
    // trang chủ
   public function getDanhSach(){
       $user = User::all();
       return view('admin.user.danhsach',['user'=>$user]);
   }

   public function getSua($id){
       $user = User::find($id);
       return view('admin.user.sua',['user'=>$user]);
   }
   public function postSua(Request $request,$id){
       $user = User::find($id);
       $user->name = $request->name;
       $user->username = $request->username;
       $user->phone = $request->phone;
       $user->money = $request->money;
       $user->quyen = $request->quyen;

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
    return redirect('admin/user/sua/'.$id);

}

public function getThem(){
  return view('admin.user.them');
}
public function postThem(Request $request){
   $this->validate($request,
      [
         'email' => 'email|unique:users,email',
         'password'=>'required|min:3|max:32',
         'passwordAgain' =>'required|same:password'
     ],
     [
         'email.email' =>'Bạn chưa nhập đúng định dạng email',
         'email.unique' =>'Email đã tồn tại',
         'password.required' => 'Bạn chưa nhập mật khẩu',
         'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
         'password.max' => 'Mật khẩu chỉ được phép tối đa 32 kí tự',
         'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
         'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng'
     ]);
   $user = new User;
   $user->name = $request->name;
   $user->email = $request->email;
   $user->username = $request->username;
   $user->phone = $request->phone;
   $user->money = $request->money;
   $user->password = bcrypt($request->password);
   $user->quyen = $request->quyen;
   if($request->hasFile('Hinh')){
    $file = $request ->file('Hinh');
    $duoi = $file->getClientOriginalExtension();
    if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'JPG'){
        $request->session()->flash('loi', 'Bạn chỉ được chọn file jpg,png');
        return redirect('admin/user/them');
    }
    $name = $file->getClientOriginalName();
    $Hinh = str_random(4)."_".$name;
    while(file_exists("upload/user/".$Hinh)){
        $Hinh = str_random(4)."_".$name;
    }
            //echo $Hinh;
    $file->move("upload/user",$Hinh);
    $user->Hinh = $Hinh;
}else{
    $user->Hinh="";
}

$user->save();
$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
return redirect('admin/user/them');

}

public function getXoa(Request $request,$id){
   $user= User::find($id);
   $user->delete();
   $request->session()->flash('thongbao', 'Xóa thành công!');
   return redirect('admin/user/danhsach');
}
}
