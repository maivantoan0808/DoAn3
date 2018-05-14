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
                    Trang chủ <span class="glyphicon glyphicon-menu-right">  </span><a href="#">  Admin</a>
                </p>
            </div>

            <div class="cl"></div>
            <div class="col-lg-12" style="border: 1px solid #dddddd; padding: 0px;margin-top: 10px; padding-left: 15px;">
             <i class="glyphicon glyphicon-asterisk"></i><span style="font-size: 20px;"> <a href="">HỌC HTML</a></span><br>
             <div class="col-lg-6" style="">
                <p align="center">
                <a><img width="200px" height="200px"  src="upload/monhoc/cYCY_tao-html5-logo-voi-css3.jpg"></p></a>
                <h4 align="center"><a>HTML CĂN BẢN</a></h4>
             </div>
         </div>
     </div>

     <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center;"><b style="text-align: center;">CHUYÊN MỤC</b></div>
            <div class="panel-body" style="margin-left: 30px;">
                <div class="row" style="margin-top: 10px;">
                    <span class="glyphicon glyphicon-star"> </span><a href="">  HTML</a>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <span class="glyphicon glyphicon-star"> </span><a href="">  CSS</a>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <span class="glyphicon glyphicon-star"> </span><a href="">  BOOTSTRAP</a>
                </div>
            </div>
        </div>
        <a href="test">DMMM</a>
    </div>
</div>
</div>
@endsection
