        @extends('admin.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài giảng
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
                                <th>Khóa học</th>
                                <th>Môn học</th>
                                <th>Giáo viên</th>
                                <th>Tiêu đề</th>
                                <th>Tóm tắt</th>
                                <th>Hình</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($baihoc as $bh)
                            <tr class="odd gradeX" align="center">
                                <td>{{$bh->id}}</td>
                                <td>{{$bh->monhoc->khoahoc->name}}</td>
                                <td>{{$bh->monhoc->name}}</td>
                                <td>{{$bh->user->name}}</td>
                                <td>{{$bh->title}}</td>
                                <td>{!!$bh->description!!}</td>
                                <td><img width="100px"  src="upload/baihoc/{{$bh->Hinh}}"></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Are you sure you want to delete this item?');" href="admin/baihoc/xoa/{{$bh->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/baihoc/sua/{{$bh->id}}">Edit</a></td>
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