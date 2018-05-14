<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoahoc;
use App\Theloai;
use App\Monhoc;
class AjaxController extends Controller
{

	public function getMonhoc($idKhoahoc){
		$monhoc = Monhoc::where('id_khoa',$idKhoahoc)->get();
		foreach($monhoc as $mh){
			echo "<option value='".$mh->id."'>".$mh->name."</option>";
		}
	}
	public function getKhoahoc($loai){
		$khoahoc = Khoahoc::where('loai',$loai)->get();
		foreach($khoahoc as $kh){
			echo "<option value='".$kh->id."'>".$kh->name."</option>";
		}
	}
}
