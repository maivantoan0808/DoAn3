@extends('layout.index')
@section('content')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
@endsection
<div class="container" style="margin-top: 10px;padding: 0px; margin-bottom: 15px; ">
    <div class="row">
        <div class="col-lg-9">
            <div class="col-lg-12" style="border: 1px solid #dddddd; padding: 0px; padding-left: 15px;">
                <p class="lead">
                    <h1></h1>
                    <a href="trangchu">Trang chủ </a> <span class="glyphicon glyphicon-menu-right">  </span><a href="monhoc/{{$monhoc->khoahoc->id}}">  {{$monhoc->khoahoc->name}}</a><span class="glyphicon glyphicon-menu-right">  </span>  {{$monhoc->name}}
                </p>
            </div>

            <div class="cl"></div>
            <div class="col-lg-12" style="border: 1px solid #dddddd; height: auto; padding: 0px;margin-top: 10px; padding-left: 15px;">
                <h3>{{$monhoc->name}}</h3>
                <p>{!!$monhoc->gioithieu!!}</p><br><br><br><br>
            </div>

        </div>
        <div class="col-md-3">
            <div class="panel panel-default" style="">
                <div class="panel-heading" style="text-align: center;"><b style="text-align: center;">Danh Sách Bài Học</b></div>
                <div class="panel-body" style="margin-left: 30px; padding: 10px;">
                    @foreach($baihoc as $b)
                    <div class="row" style="margin-top: 10px; padding-left: 0px;">
                        <span class="col-md-2"><span style="" class="glyphicon glyphicon-star"> </span></span><a class="col-md-10" href="baihoc/{{$b->id}}/{{$b->monhoc_id}}">  {{$b->title}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;"><b style="text-align: center;">Bài tập</b></div>
                <div class="panel-body" style="margin-left: 30px;">
                    @foreach($de as $d)
                    <div class="row" style="margin-top: 10px;">
                        <span class="col-md-2"><span class="glyphicon glyphicon-star"> </span></span><a class="col-md-10" href="dethi/{{$d->id}}">  {{$d->title}}</a>
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
