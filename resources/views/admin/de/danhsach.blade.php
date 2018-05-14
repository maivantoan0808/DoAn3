        @extends('admin.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đề thi
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
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($de as $d)
                            <tr class="odd gradeX" align="center">
                                <td>{{$d->id}}</td>
                                <td>{{$d->monhoc->khoahoc->name}}</td>
                                <td>{{$d->monhoc->name}}</td>
                                <td>{{$d->user->name}}</td>
                                <td>{{$d->title}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Are you sure you want to delete this item?');" href="admin/de/xoa/{{$d->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a  href="admin/de/sua/{{$d->id}}">Edit</a></td>
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