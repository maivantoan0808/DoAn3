            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="admin/droadboad"><i class="glyphicon glyphicon-signal"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="admin/user/danhsach"><i class="glyphicon glyphicon-user"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user/danhsach">Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/user/them">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/khoahoc/danhsach"><i class="glyphicon glyphicon-list"></i> Khóa học<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/khoahoc/danhsach">Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/khoahoc/them">Thêm khóa học</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/monhoc/danhsach"><i class="fa fa-bar-chart-o fa-fw"></i> Môn học<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/monhoc/danhsach">Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/monhoc/them">Thêm môn học</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/baihoc/danhsach"><i class="glyphicon glyphicon-book"></i> Bài học<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/baihoc/danhsach">Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/baihoc/them">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/de/danhsach"><i class="glyphicon glyphicon-list-alt"></i> Đề thi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/de/danhsach">Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/de/them">Thêm đề thi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/cauhoi/danhsach"><i class="glyphicon glyphicon-question-sign"></i> Câu hỏi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/cauhoi/danhsach">Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/cauhoi/them">Thêm câu hỏi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/quiz_test/danhsach"><i class="glyphicon glyphicon-question-sign"></i> Quiz_test<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/quiz_test/danhsach">Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/quiz_test/them">Thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <?php  
                              $i=0;
                       

                                foreach($DONGGOP as $dg){
                                    if($dg->status =="Chưa xem"){
                                        $i++;
                                    }
                                }
                         
                            ?>
                            <a href="admin/donggop/danhsach">
                                <i  class="glyphicon glyphicon-comment" ><span style="color: red;"><?php if($i>0) echo $i; ?></span>
                                </i>
                                 Ý kiến đóng góp</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>