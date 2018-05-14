        @extends('admin.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khóa học
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
                                <th>Tên khóa học</th>
                                <th>Giới thiệu</th>
                                <th>Hình ảnh</th>
                                <th>Loại</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($khoa as $khoa)
                            <tr class="odd gradeX" align="center">
                                <td>{{$khoa->id}}</td>
                                <td>{{$khoa->name}}</td>
                                <td>{{$khoa->gioithieu}}</td>
                                <td><img width="100px"  src="upload/khoahoc/{{$khoa->Hinh}}"></td>
                                <td>
                                    @if($khoa->loai==0)
                                    {{"Miễn phí"}}
                                    @else
                                    {{"Mất phí"}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Are you sure you want to delete this item?');" href="admin/khoahoc/xoa/{{$khoa->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a  href="admin/khoahoc/sua/{{$khoa->id}}">Edit</a></td>
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