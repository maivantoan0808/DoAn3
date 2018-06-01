<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('login','PagesController@getLogin');
Route::post('login','PagesController@postLogin');
Route::get('logout','PagesController@logout');
Route::get('test','HomeController@test');
Route::get('test1','HomeController@test1');
// Dành cho học sinh đăng nhập vào hệ thống và giao diện của học sinh
Route::get('trangchu','PagesController@getTrangchu');
Route::get('khoahoc/nguoikhuyettat', function() {
	return view('nguoikhuyettat');
});
Route::get('monhoc/{id}','PagesController@monhoc');
Route::get('danhsachbaihoc/{id}','PagesController@danhsachbaihoc');
Route::get('baihoc/{id}/{monhoc_id}','PagesController@baihoc');
Route::get('dethi/{id}','PagesController@getdethi');
Route::get('logoutHocSinh','PagesController@logoutHocSinh');
Route::get('giangvien','PagesController@giangvien');
Route::get('lienhe','PagesController@getlienhe');
Route::post('lienhe','PagesController@postlienhe');
Route::get('thongtincanhan/{id}','PagesController@thongtincanhan');
Route::post('thongtincanhan/{id}','PagesController@postthongtincanhan');
Route::post('comment/{id}','CommentController@postComment');
Route::post('comment1/{id}','CommentController@postComment1');
Route::get('download/{id}/{monhoc_id}','HomeController@download');
Route::get('thich/{users_id}/{baihoc_id}','HomeController@thich');
Route::post('dangnhap/{khoahoc_id}','PagesController@postdangnhap');
Route::post('napthe/{khoahoc_id}/{users_id}','PagesController@postnapthe');
Route::get('thanhtoan/{users_id}/{monhoc_id}/{khoahoc_id}','PagesController@getthanhtoan');
Route::get('naptien/{users_id}','PagesController@getnaptien');
Route::post('naptien/{users_id}','PagesController@postnaptien');
Route::post('dangky','PagesController@postDangky');
Route::post('dangnhap','PagesController@dangnhap');
// admin
Route::group(['prefix'=>'admin','middleware'=>'Login'],function(){
	Route::get('droadboad','HomeController@charts');

	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getdanhsach');
		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');
		Route::get('them','UserController@getThem');
		Route::post('them',['as' => 'them','uses' => 'UserController@postThem']);
		Route::get('xoa/{id}','UserController@getXoa');
	});
	Route::group(['prefix'=>'khoahoc'],function(){
		Route::get('danhsach','KhoahocController@getdanhsach');
		Route::get('sua/{id}','KhoahocController@getSua');
		Route::post('sua/{id}','KhoahocController@postSua');
		Route::get('them','KhoahocController@getThem');
		Route::post('them',['as' => 'them','uses' => 'KhoahocController@postThem']);
		Route::get('xoa/{id}','KhoahocController@getXoa');

	});
	Route::group(['prefix'=>'monhoc'],function(){
		Route::get('danhsach','MonhocController@getdanhsach');
		Route::get('sua/{id}','MonhocController@getSua');
		Route::post('sua/{id}','MonhocController@postSua');
		Route::get('them','MonhocController@getThem');
		Route::post('them',['as' => 'them','uses' => 'MonhocController@postThem']);
		Route::get('xoa/{id}','MonhocController@getXoa');

	});
	Route::group(['prefix'=>'baihoc'],function(){
		Route::get('danhsach','BaihocController@getdanhsach');
		Route::get('sua/{id}','BaihocController@getSua');
		Route::post('sua/{id}','BaihocController@postSua');
		Route::get('them','BaihocController@getThem');
		Route::post('them',['as' => 'them','uses' => 'BaihocController@postThem']);
		Route::get('xoa/{id}','BaihocController@getXoa');

	});
	Route::group(['prefix'=>'de'],function(){
		Route::get('danhsach','DeController@getdanhsach');
		Route::get('sua/{id}','DeController@getSua');
		Route::post('sua/{id}','DeController@postSua');
		Route::get('them','DeController@getThem');
		Route::post('them',['as' => 'them','uses' => 'DeController@postThem']);
		Route::get('xoa/{id}','DeController@getXoa');

	});
	Route::group(['prefix'=>'cauhoi'],function(){
		Route::get('danhsach','CauhoiController@getdanhsach');
		Route::get('sua/{id}','CauhoiController@getSua');
		Route::post('sua/{id}','CauhoiController@postSua');
		Route::get('them','CauhoiController@getThem');
		Route::post('them',['as' => 'them','uses' => 'CauhoiController@postThem']);
		Route::get('xoa/{id}','CauhoiController@getXoa');

	});
	Route::group(['prefix'=>'quiz_test'],function(){
		Route::get('danhsach','Quiz_testController@getdanhsach');
		Route::get('sua/{id}','Quiz_testController@getSua');
		Route::post('sua/{id}','Quiz_testController@postSua');
		Route::get('them','Quiz_testController@getThem');
		Route::post('them',['as' => 'them','uses' => 'Quiz_testController@postThem']);
		Route::get('xoa/{id}','Quiz_testController@getXoa');

	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('monhoc/{idKhoahoc}','AjaxController@getMonhoc');
		Route::get('loai/{loai}','AjaxController@getKhoahoc');

	});
	Route::group(['prefix'=>'donggop'],function(){
		Route::get('danhsach','DongGopController@danhsach');
		Route::get('xem/{id}','DongGopController@xem');
	});
	Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{id}/{baihoc_id}','CommentController@getXoa');
	});
	Route::group(['prefix'=>'comment1'],function(){
		Route::get('xoa/{id}/{de_id}','CommentController@getXoa1');
	});
});

// giáo viên
Route::group(['prefix'=>'giaovien','middleware'=>'Login'],function(){
	Route::get('sua/{id}','GiaoVienController@getSua');
	Route::post('sua/{id}','GiaoVienController@postSua');
	Route::group(['prefix'=>'monhoc'],function(){
		Route::get('danhsach','GiaoVienController@getdanhsachMH');
		Route::get('sua/{id}','GiaoVienController@getSuaMH');
		Route::post('sua/{id}','GiaoVienController@postSuaMH');
		Route::get('them','GiaoVienController@getThemMH');
		Route::post('them',['as' => 'them','uses' => 'GiaoVienController@postThemMH']);
		Route::get('xoa/{id}','GiaoVienController@getXoaMH');
	});
	Route::group(['prefix'=>'baihoc'],function(){
		Route::get('danhsach','GiaoVienController@getdanhsachBH');
		Route::get('sua/{id}','GiaoVienController@getSuaBH');
		Route::post('sua/{id}','GiaoVienController@postSuaBH');
		Route::get('them','GiaoVienController@getThemBH');
		Route::post('them',['as' => 'them','uses' => 'GiaoVienController@postThemBH']);
		Route::get('xoa/{id}','GiaoVienController@getXoaBH');
	});
	Route::group(['prefix'=>'de'],function(){
		Route::get('danhsach','GiaoVienController@getdanhsachDe');
		Route::get('sua/{id}','GiaoVienController@getSuaDe');
		Route::post('sua/{id}','GiaoVienController@postSuaDe');
		Route::get('them','GiaoVienController@getThemDe');
		Route::post('them',['as' => 'them','uses' => 'GiaoVienController@postThemDe']);
		Route::get('xoa/{id}','GiaoVienController@getXoaDe');

	});
	Route::group(['prefix'=>'cauhoi'],function(){
		Route::get('danhsach','GiaoVienController@getdanhsachCH');
		Route::get('sua/{id}','GiaoVienController@getSuaCH');
		Route::post('sua/{id}','GiaoVienController@postSuaCH');
		Route::get('them','GiaoVienController@getThemCH');
		Route::post('them',['as' => 'them','uses' => 'GiaoVienController@postThemCH']);
		Route::get('xoa/{id}','GiaoVienController@getXoaCH');
	});
});

