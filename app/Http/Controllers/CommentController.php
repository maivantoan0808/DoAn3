<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoahoc;
use App\Monhoc;
use App\Baihoc;
use App\User;
use App\donggop;
use App\De;
use Illuminate\Support\Facades\Auth;
use App\Comment;
class CommentController extends Controller
{
    //
	public function getXoa(Request $request,$id,$baihoc_id){
		$comment= Comment::find($id);
		$comment->delete();
		$request->session()->flash('thongbao', 'Xóa comment thành công!');
		return redirect('admin/baihoc/sua/'.$baihoc_id);
	}

	public function postComment(Request $request,$id){
		$baihoc = Baihoc::find($id);
		$comment = new Comment;
		$comment->baihoc_id = $id;
		$comment->users_id = Auth::user()->id;
		$comment->content = $request->content;
		$comment->save();

		return redirect('baihoc/'.$id.'/'.$baihoc->monhoc_id.'');
	}
	public function getXoa1(Request $request,$id,$de_id){
		$comment= Comment::find($id);
		$comment->delete();
		$request->session()->flash('thongbao', 'Xóa comment thành công!');
		return redirect('admin/de/sua/'.$de_id);
	}

	public function postComment1(Request $request,$id){
		$de = De::find($id);
		$comment = new Comment;
		$comment->de_id = $id;
		$comment->users_id = Auth::user()->id;
		$comment->content = $request->content;
		$comment->save();

		return redirect('dethi/'.$id.'');
	}
}
