        
@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Môn học
                    <small>{{$monhoc->name}}</small>
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
                <form action="admin/monhoc/sua/{{$monhoc->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group" id="selectId">
                        <label>Loại khóa học</label>
                        <select class="form-control" name="loai" id="Loai">
                            <option @if($monhoc->khoahoc->loai==0) {{'selected'}} @endif value="0">Miễn phí</option>
                            <option @if($monhoc->khoahoc->loai==1) {{'selected'}} @endif value="1">Mất phí</option>
                        </select>
                    </div>
                    <div class="form-group" id="khmienphi">
                        <label>Khóa học</label>
                        <select class="form-control" name="Khoahoc" id="Khoahoc">
                            @foreach($khoahoc as $kh)
                            <option 
                            @if($monhoc->khoahoc->id == $kh->id)
                            {{'selected'}} 
                            @endif 
                            value="{{$kh->id}}">{{$kh->name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group"  style="display: @if($monhoc->khoahoc->loai==0){{"none"}} @else {{"block"}} @endif;" id="money">
                    <label>Money</label>
                    <input id="tien" required="" type="number" value="{{$monhoc->money}}" class="form-control" name="money" placeholder="Nhập phí môn học"  />
                </div>
                <div class="form-group">
                    <label>Tên môn học</label>
                    <input required="" class="form-control" name="name" placeholder="Nhập tên môn học" value="{{$monhoc->name}}" />
                </div>
                <div class="form-group">
                    <label>Giảng viên</label>
                    <select class="form-control" name="users_id" id="GiangVien">
                        @foreach($user as $u)
                        <option 
                        @if($monhoc->user->id == $u->id)
                        {{'selected'}} 
                        @endif
                        value="{{$u->id}}">{{$u->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Giới thiệu</label>
                <textarea required="" name="gioithieu" id="demo" class="form-control ckeditor" rows="3">{{$monhoc->gioithieu}}</textarea>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <p>
                    <img width="400px" src="upload/monhoc/{{$monhoc->Hinh}}">
                </p>
                <input type="file" name="Hinh" class="form-control">
            </div>

            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <form>
            </div>
        </div>
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