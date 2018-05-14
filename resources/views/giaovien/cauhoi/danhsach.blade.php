        @extends('giaovien.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Câu hỏi
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Môn học</th>
                                <th>Nội dung</th>
                                <td>Hình ảnh</td>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>Answer</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cauhoi as $c)
                            <tr class="odd gradeX" align="center">
                                <td>{{$c->id}}</td>
                                <td>{{$c->monhoc->name}}</td>
                                <td>{!!$c->content!!}</td>
                                <td><img width="100px"  src="upload/cauhoi/{{$c->Hinh}}"></td>
                                <td>{{$c->A}}</td>
                                <td>{{$c->B}}</td>
                                <td>{{$c->C}}</td>
                                <td>{{$c->D}}</td>
                                <td>{{$c->answer}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Are you sure you want to delete this item?');" href="giaovien/cauhoi/xoa/{{$c->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a  href="giaovien/cauhoi/sua/{{$c->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection
        @section('script')
        @endsection