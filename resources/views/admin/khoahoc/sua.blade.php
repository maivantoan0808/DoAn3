        @extends('admin.layout.index')
        @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khóa học
                            <small>{{$khoa->name}}</small>
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
                        <form action="admin/khoahoc/sua/{{$khoa->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên khóa học</label>
                                <input required="" class="form-control" name="name" placeholder="" value="{{$khoa->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu</label>
                                <input required="" class="form-control" name="gioithieu" placeholder="" value="{{$khoa->gioithieu}}" />
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <label class="radio-inline">
                                    <input name="loai" value="0" checked="" type="radio"
                                    @if($khoa->loai==0)
                                    {{'checked'}}
                                    @endif
                                    >Miễn phí
                                </label>
                                <label class="radio-inline">
                                    <input name="loai" value="1" type="radio"
                                    @if($khoa->loai==1)
                                    {{'checked'}}
                                    @endif
                                    >Mất phí
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width="400px" src="upload/khoahoc/{{$khoa->Hinh}}">
                                </p>
                                <input type="file" name="Hinh" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
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