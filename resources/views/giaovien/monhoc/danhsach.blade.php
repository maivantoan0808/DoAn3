        @extends('giaovien.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Môn học
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
                                <th>Name</th>
                                <th>Hình</th>
                                <th>Khóa học</th>
                                <th>Money</th>
                                <th>Giảng viên</th>
                                <th>Giới thiệu</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monhoc as $mh)
                            <tr class="odd gradeX" align="center">
                                <td>{{$mh->id}}</td>
                                <td>{{$mh->name}}</td>
                                <td>
                                    <img width="100px"  src="upload/monhoc/{{$mh->Hinh}}">
                                </td>
                                <td>{{$mh->khoahoc->name}}</td>
                                <td><?php echo number_format($mh->money,2)." VND"; ?> </td>
                                <td>{{$mh->user->name}}</td>
                                <td>{!!$mh->gioithieu!!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Are you sure you want to delete this item?');" href="giaovien/monhoc/xoa/{{$mh->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="giaovien/monhoc/sua/{{$mh->id}}">Edit</a></td>
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