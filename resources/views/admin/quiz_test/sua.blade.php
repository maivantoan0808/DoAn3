        
@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quiz_test
                    <small>{{$quiz_test->id}}</small>
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
                <form action="admin/quiz_test/sua/{{$quiz_test->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Khóa học</label>
                        <select class="form-control" name="Khoahoc" id="Khoahoc">
                            @foreach($khoahoc as $kh)
                            <option 
                            @if($quiz_test->monhoc->khoahoc->id == $kh->id)
                            {{'selected'}} 
                            @endif 
                            value="{{$kh->id}}">{{$kh->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Môn học</label>
                    <select class="form-control" name="monhoc_id" id="Monhoc">
                        @foreach($monhoc as $mh)
                        <option 
                        @if($quiz_test->monhoc->id == $mh->id)
                        {{'selected'}} 
                        @endif
                        value="{{$mh->id}}">{{$mh->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Đề thi</label>
                <select class="form-control" name="de_id" id="Monhoc">
                    @foreach($de as $d)
                    <option 
                    @if($quiz_test->de->id == $d->id)
                    {{'selected'}} 
                    @endif
                    value="{{$d->id}}">{{$d->title}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Câu hỏi</label>
            <select class="form-control" name="cauhoi_id" id="Monhoc">
                @foreach($cauhoi as $ch)
                <option 
                @if($quiz_test->cauhoi->id == $ch->id)
                {{'selected'}} 
                @endif
                value="{{$ch->id}}">{{$ch->title}}
            </option>
            @endforeach
        </select>
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