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
                    <a href="trangchu">Trang chủ </a> <span class="glyphicon glyphicon-menu-right">  </span><a href="monhoc/{{$dethi->monhoc->khoahoc->id}}">  {{$dethi->monhoc->khoahoc->name}}</a><span class="glyphicon glyphicon-menu-right">  </span><a href="danhsachbaihoc/{{$dethi->monhoc->id}}">  {{$dethi->monhoc->name}}</a><span class="glyphicon glyphicon-menu-right">  </span>{{$dethi->title}}
                </p>
            </div>

            <div class="cl"></div>
            <div class="col-lg-12" style=" height: auto; padding: 0px;margin-top: 10px; padding-left: 15px;">
                <?php

                $i=0;
                $j=0;
                $str ='';
                if(isset($_GET['btnKiemTra'])){
                    echo '<h3 style="text-align:center;">Kết quả</h3>';
                    $count =0;
                    echo '<table class="table table-bordered">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>You anwser</th>
                    <th>Correct anwser</th>
                    <th>Result</th>
                    </tr>
                    </thead>
                    <tbody>';
                    foreach ($quiz_test as $qt) {
                        $count++;
                        $val = $qt->cauhoi->id;
                        if(isset($_GET[''.$val.''])){
                            if($qt->cauhoi->answer == $_GET[''.$val.'']){
                                echo '<tr class="success">
                                <th>'.$count.'</th>
                                <th>'.$_GET[''.$val.''].'</th>
                                <th>'.$qt->cauhoi->answer.'</th>
                                <th><span class="glyphicon glyphicon-ok text-success aria-hidden="true""></span></th>
                                </tr>';
                                $j++;
                                $str ="";
                            }else if($qt->cauhoi->answer != $_GET[''.$val.'']){
                                echo '<tr class="danger">
                                <th>'.$count.'</th>
                                <th>'.$_GET[''.$val.''].'</th>
                                <th>'.$qt->cauhoi->answer.'</th>
                                <th><span class="glyphicon glyphicon-remove text-danger aria-hidden="true""></span></th>
                                </tr>';
                                $str="red";
                            }else{
                                echo '<tr class="danger">
                                <th>'.$count.'</th>
                                <th></th>
                                <th>'.$qt->cauhoi->answer.'</th>
                                <th><span class="glyphicon glyphicon-remove text-danger aria-hidden="true""></span></th>
                                </tr>';
                                $str="red";
                            }
                        }else{
                            echo '<tr class="danger">
                            <th>'.$count.'</th>
                            <th></th>
                            <th>'.$qt->cauhoi->answer.'</th>
                            <th><span class="glyphicon glyphicon-remove text-danger aria-hidden="true""></span></th>
                            </tr>';
                            $str="red";
                        }
                        

                    }
                    echo '</tbody>
                    </table>';

                    if($j/$count >= 0.5){
                        echo '<div class="alert alert-success">'.round(($j/$count)*100,2).'%  => Bạn đã qua</div>';
                    }else{
                        echo '<div class="alert alert-danger">'.round(($j/$count)*100,2).'%   => Bạn đã tạch</div>';
                    }

                }
                ?>
                <form method="get" action="dethi/{{$dethi->id}}" style="border:1px solid #dddddd; padding: 10px;">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @foreach($quiz_test as $qt)
                    <?php $i++; ?>
                    <b><p style=""><?php echo $i; ?>. {!!$qt->cauhoi->content!!}</p></b>
                    <ul style="list-style: none;">

                        <li>
                            <input type="radio"
                            <?php 
                                if(isset($_GET['btnKiemTra'])){
                                    if(isset($_GET[''. $qt->cauhoi->id.''])){
                                        if($_GET[''. $qt->cauhoi->id.'']=='A'){
                                            echo 'checked';
                                        }
                                    }
                                }
                            ?>  
                            name="{{$qt->cauhoi->id}}" value="A">&nbsp;&nbsp;{{$qt->cauhoi->A}}</li>
                            <li>
                                <input type="radio"
                                <?php 
                                if(isset($_GET['btnKiemTra'])){
                                    if(isset($_GET[''. $qt->cauhoi->id.''])){
                                        if($_GET[''. $qt->cauhoi->id.'']=='B'){
                                            echo 'checked';
                                        }
                                    }
                                }
                                ?> 
                                name="{{$qt->cauhoi->id}}" value="B">&nbsp;&nbsp;{{$qt->cauhoi->B}}</li>
                                <li>
                                    <input type="radio"
                                    <?php 
                                if(isset($_GET['btnKiemTra'])){
                                    if(isset($_GET[''. $qt->cauhoi->id.''])){
                                        if($_GET[''. $qt->cauhoi->id.'']=='C'){
                                            echo 'checked';
                                        }
                                    }
                                }
                                    ?> 
                                    name="{{$qt->cauhoi->id}}" value="C">&nbsp;&nbsp;{{$qt->cauhoi->C}}</li>
                                    <li>
                                        <input  type="radio"
                                        <?php 
                                if(isset($_GET['btnKiemTra'])){
                                    if(isset($_GET[''. $qt->cauhoi->id.''])){
                                        if($_GET[''. $qt->cauhoi->id.'']=='D'){
                                            echo 'checked';
                                        }
                                    }
                                }
                                        ?> 
                                        name="{{$qt->cauhoi->id}}" value="D">&nbsp;&nbsp;{{$qt->cauhoi->D}}
                                    </li>
                                </ul>
                                @endforeach
                                <br>
                                @if($i>0)
                                <input type="submit" name="btnKiemTra" value="Nộp bài" style="background-color: #4516CC; color: white; padding: 20px; border-radius: 15px;">
                                @endif
                            </form>
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
                    @foreach($dethi->comment as $cm)
                    <!-- Comment -->
                    <div class="col-lg-12" style="margin-top: 40px;">
                        <a class="pull-left" href="#" style="margin-left: 30px; ">
                            <img width="30" height="30" class="media-object" src="upload/user/{{$dethi->user->Hinh}}" alt="">
                        </a>
                        <div class="media-body" style="padding-left: 10px;">
                            <h4 class="media-heading">{{$cm->user->name}}
                                <small>{{$cm->created_at}}</small>
                            </h4>
                            {{$cm->content}}
                            <a href="">Thích</a><a id="traloi">Trả lời</a>
                            <form  id="content" style="display: none;" action="" role="form" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <textarea required="" class="form-control" name="content1" rows="3"></textarea>
                                <button type="submit" class="btn btn-primary">Trả lời</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    @endforeach
                    @if(Auth::user())
                    <div class="col-lg-12" >
                        <h3 style="margin-top: 20px;">Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h3>
                        <form action="comment1/{{$dethi->id}}" role="form" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <textarea required="" class="form-control" name="content" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>
                    </div>
                    @endif
                    <hr>

                </div>
            </div>
{{-- <div style="text-align: center;">
    {{$baihoc->links()}}
</div> --}}
@endsection
@section('script')
<script type="text/javascript">
    var traloi = document.getElementById('traloi');
    var content = document.getElementById('content');
    traloi.addEventListener('click',function(){
        if(content.style.display=="none"){
            content.style.display="block";
        }else{
            content.style.display="none";
        }
        
    });
</script>
@endsection
