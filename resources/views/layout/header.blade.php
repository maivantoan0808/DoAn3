		<nav class="fh5co-nav" role="navigation" style="background-color:#3d5777; color: white; font-size: 15px;">
			<div class="top-menu">
				<div class="container">
					<div class="row" style="padding: 0px;">
						<div class="col-xs-4">
							<a href="trangchu"><img width="90" src="img/bk.png" height="100"></a>
							<i style="" class="icon-study">   </i> Elearning - Bách Khoa Hà Nội

						</div>
						<div class="col-xs-8 text-right menu-1" style="color: white;" >
							<ul style="color: white;">
								<li class="active"><a href="trangchu" style="color: white;">Trang chủ</a></li>
								<li class="has-dropdown">
									<a style="color: white;">Khóa học</a>
									<ul class="dropdown">
										@foreach($KHOAHOC as $kh)
										<li><a href="monhoc/{{$kh->id}}">{{$kh->name}}</a></li>
										@endforeach
									</ul>
								</li>
								<li><a href="giangvien" style="color: white;">Giảng viên</a></li>
								{{-- <li><a href="" style="color: white;">Pricing</a></li> --}}
{{-- 							<li class="has-dropdown">
								<a href="blog.html">Blog</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li> --}}
							<li><a href="lienhe" style="color: white;">Liên hệ</a></li>
							@if(!Auth::user())
							<li class="btn-cta"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
								Đăng ký
							</button></li>
							<li class="btn-cta"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3">
								Đăng nhập
							</button></li>
							@else
							<li class="has-dropdown">
								<img src="upload/user/{{Auth::user()->Hinh}}" width="30px" height="30px">
								<a style="color: white;" class="dropdown-toggle" data-toggle="dropdown" href="thongtincanhan/{{Auth::user()->id}}"><span>{{Auth::user()->username}}</span>
								</a>
								<ul class="dropdown">
									<li><a href="naptien/{{Auth::user()->id}}">Nạp tiền</a></li>
									<li><a href="thongtincanhan/{{Auth::user()->id}}">Thông tin tài khoản</a></li>
									<li><a href="logoutHocSinh">Đăng xuất</a></li>
								</ul>
							</li>
							<li class="btn-cta"><a><span><?php echo number_format(Auth::user()->money,2)." VND"; ?></span></a></li>
							@endif

						</ul>
					</div>
				</div>

			</div>
			<div class="modal" id="myModal2">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title" style="color: blue;">Đăng ký</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
								{{$err}}<br>
								@endforeach
							</div>
							@endif
							{{-- @if(session('thongbao'))
							<script type="text/javascript">
								alert("Bạn đã đăng ký thành công ABC!")
							</script>
							@endif --}}
							@if(session('loi'))
							<div class="alert alert-danger">
								{{session('loi')}}
							</div>
							@endif
							<form role="form" action="dangky" method="POST">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<fieldset>
									<div class="form-group">
										<h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Username</h5>
										<input class="form-control" placeholder="username" name="username" type="text" autofocus>
									</div>
									<div class="form-group">
										<h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Fullname</h5>
										<input class="form-control" placeholder="fullname" name="name" type="text" autofocus>
									</div>
									<div class="form-group">
										<h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Email</h5>
										<input class="form-control" placeholder="email" name="email" type="email" autofocus>
									</div>
									<div class="form-group">
										<h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Password</h5>
										<input class="form-control" placeholder="password" name="password" type="password" autofocus>
									</div>
									<div class="form-group">
										<h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Password Again</h5>
										<input class="form-control" placeholder="passwordAgain" name="passwordAgain" type="password" value="">
									</div>
									<button type="submit" class="btn btn-lg btn-success btn-block">Đăng ký</button>
								</fieldset>
							</form>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
			@if(count($errors)>0)
			<script>
				$(document).ready(function(){
					$("#myModal2").modal();
				});
			</script>
			@endif
			<div class="modal" id="myModal3">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title" style="color: blue;">Đăng nhập</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							@if(session('thongbao1'))
							<script type="text/javascript">
								alert("Bạn đã đăng ký thành công ABC!")
							</script>
							@endif
							@if(session('loi1'))
							<div class="alert alert-danger">
								{{session('loi1')}}
							</div>
							@endif
							<form role="form" action="dangnhap" method="POST">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<fieldset>
									<div class="form-group">
										<h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Email</h5>
										<input class="form-control" placeholder="email" name="email" type="email" autofocus>
									</div>
									<div class="form-group">
										<h5 style="color: #3E37C9; font-style: italic; font-weight: bold;">Password</h5>
										<input class="form-control" placeholder="password" name="password" type="password" autofocus>
									</div>
									<button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
								</fieldset>
							</form>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
			@if(session('loi1'))
			<script>
				$(document).ready(function(){
					$("#myModal3").modal();
				});
			</script>
			@endif
		</div>
	</nav>