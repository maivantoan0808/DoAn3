@extends('layout.index')
@section('content')
<div id="page-wrapper" style="border: 1px solid black;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" style="text-align: center;">
				<h1 class="page-header">
					Thông tin cá nhân
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-2"></div>
			<div class="col-lg-8" style="margin-bottom:120px; border: 1px solid #dddddd;">
				@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}<br>
					@endforeach
				</div>
				@endif
				@if(session('thongbao'))
				<div class="alert alert-success">
					{{session('thongbao')}}
				</div>
				@endif
				@if(session('loi'))
				<div class="alert alert-danger">
					{{session('loi')}}
				</div>
				@endif
				<form action="thongtincanhan/{{$user->id}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
						<p align="center">
							<img style=" margin: 24px 0 12px 0;text-align: center; border-radius: 150px;" height="300px;" width="300px" src="upload/user/{{$user->Hinh}}">
						</p>
						<input style="padding-left: 380px;" type="file" name="Hinh" class="form-control">
					</div>
					<div class="form-group">
						<label>Họ và tên</label>
						<input required="" class="form-control" name="name" placeholder="Họ tên" value="{{$user->name}}" />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input required="" type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" readonly="" />
					</div>
					<div class="form-group">
						<label>Username</label>
						<input required="" class="form-control" name="username" placeholder="Username" value="{{$user->username}}" />
					</div>
					<div class="form-group">
						<label>Số dư tài khoản</label>
						<input readonly="" class="form-control" name="money" placeholder="Money" value="{{$user->money}} VND" />
					</div>
					<div class="form-group">
						<input type="checkbox" id="changePassword" name="changePassword" >
						<label>Đổi mật khẩu</label>
						<input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" disabled="" />
					</div>
					<div class="form-group">

						<label>Nhập lại Password</label>
						<input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled="" />
					</div>
					<div class="form-group">
						<label>Số điện thoại</label>
						<input required="" class="form-control" name="phone" placeholder="Phone" value="{{$user->phone}}" />
					</div>
					<button style="background-color: #B10B94; color: white;" type="submit" class="btn btn-default">Cập nhật</button>
					<form>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>
		</div>
		@endsection
		@section('script')
		<script type="text/javascript">
			$(document).ready(function(){
				$("#changePassword").change(function(){
					if($(this).is(":checked")){
						$(".password").removeAttr('disabled');
					}else{
						$(".password").attr('disabled','');
					}
				});
			});
		</script>
		@endsection
