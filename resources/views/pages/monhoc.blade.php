@extends('layout.index')
@section('content')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
@endsection
<div class="container" style="margin-top: 10px;padding: 0px; margin-bottom: 15px;">
    <div class="row">

        <div class="col-lg-9">
            <div class="col-lg-12" style="border: 1px solid #dddddd; padding: 0px; padding-left: 15px;">
                <p class="lead">
                    <h1></h1>
                    <a href="trangchu">Trang chủ </a> <span class="glyphicon glyphicon-menu-right">  </span >  {{$khoahoc->name}}
                </p>
            </div>

            <div class="cl"></div>
            <div class="col-lg-12" style=" padding: 0px;margin-top: 10px; ">
                @foreach($monhoc as $m)
                <div class="col-lg-6" style="border: 1px solid #dddddd;padding-bottom: 20px;">
                    <p align="center">
                        <a href="danhsachbaihoc/{{$m->id}}"><img width="200px" height="200px"  src="upload/monhoc/{{$m->Hinh}}">
                        </a>
                    </p>
                    {{-- <h4 align="center"><a href="danhsachbaihoc/{{$m->id}}">{{$m->name}}</a></h4> --}}
                    @if($khoahoc->loai==1)
                    <h4 style="" align="center" style="color: red;"><?php echo number_format($m->money)." VND"; ?></h4>
                    @if(Auth::user())
                    <?php $i=0; ?>
                    @foreach($BUY as $buy)
                        @if(($buy->monhoc_id == $m->id)&&($buy->users_id == Auth::user()->id))
                        <h4 align="center"><a href="danhsachbaihoc/{{$m->id}}">{{$m->name}}</a></h4>
                        <h4 align="center" style=" color: green;" >$$$ Đã mua $$$</h4>
                        <?php $i++; ?>
                        @endif
                    @endforeach
                    @if($i==0)
                    <h4 align="center"><a>{{$m->name}}</a></h4>
                    @if(Auth::user()->money>=$m->money)
                    <h4 align="center" style="padding-top: 10px;"><a href="thanhtoan/{{Auth::user()->id}}/{{$m->id}}/{{$m->khoahoc->id}}" style="padding: 10px; border-radius: 10px; background-color: #DD2E6C; color: white;">Mua ngay</a></h4>
                    @else
                    <h4 align="center" ><input type="submit" name="mua" value="Mua ngay" style=" border-radius: 10px; background-color: #DD2E6C; color: white; " class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"></h4>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">

                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" style="color: red;">NẠP THẺ CÀO TRỰC TUYẾN</h4>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif
                            @if(session('thongbao1'))
                            <div class="alert alert-success">
                                {{session('thongbao1')}}
                            </div>
                            @endif
                            @if(session('loi1'))
                            <div class="alert alert-danger">
                                {{session('loi1')}}
                            </div>
                            @endif
                            <form role="form" action="napthe/{{$m->khoahoc->id}}/{{Auth::user()->id}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <fieldset>
                                    <div class="form-group">
                                        <h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Loại thẻ</h5>
                                        <select class="form-control" name="loaithe" id="Loai">
                                            <?php
                                            $arr = array();
                                            $arr1 = array();
                                            foreach($THECAO as $tc){
                                                $arr[] = $tc->loaithe;
                                            }
                                            $arr1 = array_unique($arr);
                                            foreach($arr1 as $key => $value){
                                                echo '<option value="'.$arr1[$key].'">'.$arr1[$key].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Mã thẻ</h5>
                                        <input required="" class="form-control" placeholder="Mã thẻ" name="mathe" type="number" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Seri</h5>
                                        <input required="" class="form-control" placeholder="Seri" name="seri" type="number" value="">
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Nạp thẻ</button>
                                </fieldset>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                  </div>
              </div>
          </div>
          @if(session('loi1') || session('thongbao1'))
          <script>
            $(document).ready(function(){
                $("#myModal").modal();
            });
        </script>
        @endif
        @endif
        @endif
        @else
        <h4 align="center" ><input type="submit" name="mua" value="Mua ngay" style=" border-radius: 10px; background-color: #DD2E6C; color: white; " class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1"></h4>
        <div class="modal fade" id="myModal1">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="color: red;">VUI LÒNG ĐĂNG NHẬP</h4>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
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
                <form role="form" action="dangnhap/{{$m->khoahoc->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <fieldset>
                        <div class="form-group">
                            <h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Email</h5>
                            <input class="form-control" placeholder="email" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Password</h5>
                            <input class="form-control" placeholder="password" name="password" type="password" value="">
                        </div>
                        <button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                    </fieldset>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

      </div>
  </div>
</div>

@if(session('loi'))
<script>
    $(document).ready(function(){
        $("#myModal1").modal();
    });
</script>
@endif
@endif


@else
<h4 align="center"><a href="danhsachbaihoc/{{$m->id}}">{{$m->name}}</a></h4>
@endif
</div>
@endforeach
</div>
</div>

<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center;"><b style="text-align: center;">CHUYÊN MỤC</b></div>
        <div class="panel-body" style="margin-left: 30px;">
            @foreach($monhoc as $m)
            <div class="row" style="margin-top: 10px;">
                @if(Auth::user())
                    <?php $j=0; ?>
                    @foreach($BUY as $buy)
                        @if(($buy->monhoc_id == $m->id)&&($buy->users_id == Auth::user()->id))
                        <span class="glyphicon glyphicon-star"> </span><a href="danhsachbaihoc/{{$m->id}}">  {{$m->name}}</a>
                        <?php $j++; ?>
                        @endif
                    @endforeach
                    @if($j==0)
                    <span class="glyphicon glyphicon-star"> </span>  {{$m->name}}
                    @endif
                @else
                <span class="glyphicon glyphicon-star"> </span><a>  {{$m->name}}</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>
@endsection
