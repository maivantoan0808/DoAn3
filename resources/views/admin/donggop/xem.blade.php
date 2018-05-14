        @extends('admin.layout.index')
        @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ý kiến đóng góp
                            <small>{{$donggop->lname}}</small>
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
                            <div class="form-group">
                                <p>Lastname: {{$donggop->lname}}</p>
                                
                            </div>
                            <div class="form-group">
                                <p>Email: {{$donggop->email}}</p>
                            </div>

                            <div class="form-group">
                                <p>Content: {{$donggop->content}}</p>
                            </div>
                            <div></div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->
                @endsection