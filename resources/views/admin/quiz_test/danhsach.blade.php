        @extends('admin.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quiz_test
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
                                <th>Đề</th>
                                <th>Câu hỏi</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quiz_test as $q)
                            <tr class="odd gradeX" align="center">
                                <td>{{$q->id}}</td>
                                <td>{{$q->monhoc->name}}</td>
                                <td>{{$q->de->title}}</td>
                                <td>{{$q->cauhoi->title}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Are you sure you want to delete this item?');" href="admin/quiz_test/xoa/{{$q->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/quiz_test/sua/{{$q->id}}">Edit</a></td>
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