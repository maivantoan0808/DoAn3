@extends('layout.index')
@section('content')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
<div class="container" style="margin-top: 10px;padding: 0px; margin-bottom: 15px;">
    <div class="row">
        <div class="col-lg-9">
            <div class="col-lg-12" style="border: 1px solid #dddddd; padding: 0px; padding-left: 15px;">
                <p class="lead">
                    <h1></h1>
                    <a href="trangchu">Trang chủ </a> <span class="glyphicon glyphicon-menu-right">  </span><a href="monhoc/{{$baihoc->monhoc->khoahoc->id}}">  {{$baihoc->monhoc->khoahoc->name}}</a><span class="glyphicon glyphicon-menu-right">  </span><a href="danhsachbaihoc/{{$baihoc->monhoc->id}}">  {{$baihoc->monhoc->name}}</a><span class="glyphicon glyphicon-menu-right">  </span> {{$baihoc->title}}
                </p>
            </div>

            <div class="cl"></div>
            <div class="col-lg-12" style="border: 1px solid #dddddd; padding: 0px;margin-top: 10px; padding-left: 15px;">
                <h2>{!! $baihoc->description !!}</h2>
                {!!$baihoc->content!!}
            </div>
            <div style=" padding-top: 30px; margin-bottom: 20px;" class="col-lg-12">

            <a style=" background-color: green; padding: 10px; border-radius: 10px; color: white;" href="download/{{$baihoc->id}}/{{$baihoc->monhoc->id}}"><i class="glyphicon glyphicon-download-alt">  </i>   Download</a>
            </div>
            <!-- Posted Comments -->
            @foreach($baihoc->comment as $cm)
            <!-- Comment -->
            <div class="col-lg-12" style="margin-top: 10px;" id="listComment">
                <a class="pull-left" href="#" style="margin-left: 10px; ">
                    <img width="30" height="30" class="media-object" src="upload/user/{{$cm->user->Hinh}}" alt="">
                </a>
                <div class="media-body" style="padding-left: 10px;">
                    <h4 class="media-heading">{{$cm->user->name}}
                        <small>{{$cm->created_at}}</small>
                    </h4>
                    {{$cm->content}}&nbsp;&nbsp;&nbsp;
                    {{-- thich/{{$cm->user->id}}/{{$baihoc->id}} --}}
                    <a href="" style="color: black;" class="button_like">   <i class="glyphicon glyphicon-thumbs-up"></i></a>&nbsp;&nbsp;
                    <a href="">Trả lời</a>
                </div>
            </div>
            <br>
            @endforeach
            @if(Auth::user())
            <div class="col-lg-12" >
                <h3 style="margin-top: 20px;">Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h3>
                <form action="comment/{{$baihoc->id}}" id="form_comment" role="form" method="post">
                    <input required="" type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <textarea required="" class="form-control" name="content" rows="3" id="ND"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="comment">Comment</button>
                </form>
            </div>
            @endif
            <hr>
            <?php ?>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;"><b style="text-align: center;">Danh Sách Bài Học</b></div>
                <div class="panel-body" style="margin-left: 30px;">
                    @foreach($bh as $b)
                    <div class="row" style="margin-top: 10px;">
                        <span class="glyphicon glyphicon-star"> </span><a href="baihoc/{{$b->id}}/{{$b->monhoc_id}}">  {{$b->title}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;"><b style="text-align: center;">Bài tập</b></div>
                <div class="panel-body" style="margin-left: 30px;">
                    @foreach($de as $d)
                    <div class="row" style="margin-top: 10px;">
                        <span class="glyphicon glyphicon-star"> </span><a href="dethi/{{$d->id}}">  {{$d->title}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</div>
{{-- <div style="text-align: center;">
    {{$baihoc->links()}}
</div> --}}
@endsection
@section('script')
{{--    <script type="text/javascript">
    
       $(document).ready(function(){
            var submit = $('#comment');
            submit.click(function(){
                console.log('ĐAt');
                $.ajax({
                    url :'test',
                    type:'post',
                    dataType: 'text',
                    data: {
                        content : $('#ND').val()
                    },
                    success : function(result){
                        $('#listComment').html(result);
                    }
                });
            });
       });
   </script> --}}
@endsection
