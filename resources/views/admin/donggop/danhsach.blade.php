        @extends('admin.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ý kiến đóng góp
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
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Xem thêm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donggop as $dg)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$dg->id}}</td>
                                    <td>{{$dg->fname}}</td>
                                     <td>{{$dg->lname}}</td>
                                     <td>{{$dg->email}}</td>
                                     <td>{{$dg->content}}</td>
                                     <td>{{$dg->status}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a  href="admin/donggop/xem/{{$dg->id}}">Xem thêm</a></td>
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