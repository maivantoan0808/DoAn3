        
@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
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
                <form action="admin/user/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input required="" class="form-control" name="name" placeholder="nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input required="" type="email" class="form-control" name="email" placeholder="nhập email" />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input required="" class="form-control" name="username" placeholder="nhập username" />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input required="" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input required="" type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input required="" type="number" class="form-control" name="phone" placeholder="nhập số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label>Money</label>
                        <input required="" type="number" class="form-control" name="money" placeholder="nhập số tiền" />
                    </div>
                    <div class="form-group">
                        <label>Quyền người dùng</label>
                        <label class="radio-inline">
                            <input name="quyen" value="2" checked="" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="1" type="radio">Giáo viên
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="0" type="radio">Thường
                        </label>
                    </div>                    
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="Hinh" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection