	<footer id="fh5co-footer" role="contentinfo" style="padding: 0px; padding-top: 15px;">
		<div class="overlay" style="background-color:#3d5777; "></div>
		<div class="container" style="background-color:#3d5777;">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>About Education</h3>
					<img width="100" src="img/bk.png">
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learning</h3>
					<ul class="fh5co-footer-links">
						<li><a href="trangchu">Khóa học</a></li>
						<li><a href="lienhe">Liên hệ</a></li>
						<li><a href="gioithieu">Giới thiệu</a></li>
					</ul>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Khóa học</h3>
					<ul class="fh5co-footer-links">
						@foreach($KHOAHOC as $kh)
						<li><a href="monhoc/{{$kh->id}}">{{$kh->name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-md-12 text-center">
					<h3 style="color: white;">
						 Copyright ©  <i class="fa fa-love"></i><a href="https://freetuts.net/">freetuts.net</a>
					</h3>
				</div>
				
			</div>
		</div>
	</footer>