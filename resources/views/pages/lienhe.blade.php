@extends('layout.index')
@section('content')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
@endsection
<div id="fh5co-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-push-1 animate-box">

				<div class="fh5co-contact-info">
					<h3>Thông tin liên hệ</h3>
					<ul>
						<li class="address">Nam  Định, <br> Việt Nam</li>
						<li class="phone"><a href="tel://1234567920">+ 981036562</a></li>
						<li class="email"><a href="mailto:tatdat97dhbkhn@gmail.com">tatdat97dhbkhn@gmail.com</a></li>
						<li class="url"><a href="https://www.facebook.com/profile.php?id=100022927800193">https://www.facebook.com/profile.php?id=100022927800193</a></li>
					</ul>
				</div>

			</div>
			<div class="col-md-6 animate-box">
				<h3>Đóng góp ý kiến</h3>
				@if(session('thongbao'))
				<div class="alert alert-success">
					{{session('thongbao')}}
				</div>
				@endif
				<form action="lienhe" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="row form-group">
						<div class="col-md-6">
							<!-- <label for="fname">First Name</label> -->
							<input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname">
						</div>
						<div class="col-md-6">
							<!-- <label for="lname">Last Name</label> -->
							<input type="text" id="lname" name="lname" class="form-control" placeholder="Your lastname">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<!-- <label for="email">Email</label> -->
							<input type="text" id="email" name="email" class="form-control" placeholder="Your email address">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<!-- <label for="message">Message</label> -->
							<textarea name="content" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" value="Send Message" class="btn btn-primary">
					</div>

				</form>		
			</div>
		</div>

	</div>
</div>
<div id="map" class="fh5co-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3148.983655687191!2d106.36968194236366!3d20.184310541723267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313605b768433e49%3A0xd8ac0ba3da367dd7!2zQsOjaSBiaeG7g24gUXXhuqV0IEzDom0!5e0!3m2!1svi!2s!4v1523292167487" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
@endsection