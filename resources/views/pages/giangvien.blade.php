@extends('layout.index')
@section('slide')
@include('layout.slide');
@endsection
@section('content')
<div id="fh5co-staff">
	<div class="container">
		<div class="row">
			<?php $i=0; ?>
			@foreach($user as $u)
			<?php $i++; 
				if($i%4==1){
					echo "<div class='col-md-12'></div>";
					
				}
			?>
			
			<div class="col-md-3 animate-box text-center">
				<div class="staff">
					<div class="staff-img" style="background-image: url(upload/user/{{$u->Hinh}});">
						<ul class="fh5co-social">
							<li><a href="https://www.facebook.com/profile.php?id=100022927800193"><i class="icon-facebook2"></i></a></li>
						</ul>
					</div>

					<h3><a href="https://www.facebook.com/profile.php?id=100022927800193">{{$u->name}}</a></h3>
					<span style="text-align: left;">Bộ môn: </span>
					<ul style="text-align: left;">
						<?php 
						// foreach ($arr1 as $key => $value) {
						// 	echo '<li>'.$arr1[$key].'</li>';
						// }
						
							foreach($u->monhoc as $m){
								if($u->id == $m->users_id){
									echo '<li>'.$m->name.'</li>';
								}
							}
							
						
						?>
					</ul>

					<p style="text-align: left;">SĐT: {{$u->phone}}</p>
					<p style="text-align: left;">Email: {{$u->email}}</p>
				</div>
			</div>
		
			@endforeach
		</div>
	</div>
</div>
@endsection