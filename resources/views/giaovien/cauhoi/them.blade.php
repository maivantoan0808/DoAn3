        
@extends('giaovien.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Câu hỏi
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
                <form action="giaovien/cauhoi/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Khóa học</label>
                        <select class="form-control" name="Khoahoc" id="Khoahoc">
                            @foreach($khoahoc as $kh)
                            <option value="{{$kh->id}}">{{$kh->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Môn học</label>
                        <select class="form-control" name="monhoc_id" id="Monhoc">
                            @foreach($monhoc as $mh)
                            <option value="{{$mh->id}}">{{$mh->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giảng viên</label>
                        <input readonly="" class="form-control" value="{{Auth::user()->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input required="" class="form-control" name="title" placeholder="Nhập tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea required="" name="content" id="demo" class="form-control ckeditor" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="Hinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>A</label>
                        <input required="" class="form-control" name="A" placeholder="Đáp án A" />
                    </div>

                    <div class="form-group">
                        <label>B</label>
                        <input required="" class="form-control" name="B" placeholder="Đáp án B" />
                    </div>

                    <div class="form-group">
                        <label>C</label>
                        <input required="" class="form-control" name="C" placeholder="Đáp án C" />
                    </div>

                    <div class="form-group">
                        <label>D</label>
                        <input required="" class="form-control" name="D" placeholder="Đáp án D" />
                    </div>

                    <div class="form-group">
                        <label>Answer</label>
                        <input required="" class="form-control" name="answer" placeholder="Đáp án của câu hỏi" />
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
        @section('script')
        <script type="text/javascript">
            $(document).ready(function(){
                $("#Khoahoc").change(function(){
                    var idKhoahoc = $(this).val();
                        //alert(idTheLoai);
                        $.get("admin/ajax/monhoc/"+idKhoahoc,function(data){
                            $("#Monhoc").html(data);
                        });
                    });
            });
        </script>
        @endsection