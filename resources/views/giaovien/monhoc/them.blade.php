        
@extends('giaovien.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Môn học
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
                <form action="giaovien/monhoc/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group" id="selectId">
                        <label>Loại khóa học</label>
                        <select class="form-control" name="loai" id="Loai">
                            <option value="0">Miễn phí</option>
                            <option value="1">Mất phí</option>
                        </select>
                    </div>
                    <div class="form-group" style="display: block;" id="khmienphi">
                        <label>Khóa học</label>
                        <select class="form-control" name="Khoahoc" id="Khoahoc">
                            @foreach($khoahoc as $kh)
                            <option value="{{$kh->id}}">{{$kh->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="display: none;" id="money">
                        <label>Money</label>
                        <input required="" type="number" class="form-control" name="money" placeholder="Nhập phí môn học" value="0" id="tien" />
                    </div>
                    <div class="form-group">
                        <label>Tên môn học</label>
                        <input required="" class="form-control" name="name" placeholder="Nhập tên môn học" />
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea required="" name="gioithieu" id="demo" class="form-control ckeditor" rows="3"></textarea>
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
        @section('script')
        <script type="text/javascript">
            $(document).ready(function(){
                $("#Loai").change(function(){
                    var loai = $(this).val();
                        //alert(idTheLoai);
                        $.get("admin/ajax/loai/"+loai,function(data){
                            $("#Khoahoc").html(data);
                        });
                    });
                $('#selectId').on('change', function () {
                 var selectVal = $("#selectId option:selected").val();
                 if(selectVal == "0"){
                    $("#tien").val(0);
                    $("#money").css("display","none");
                }else{

                    $("#money").css("display","block");
                }
            });
            });
        </script>
        @endsection