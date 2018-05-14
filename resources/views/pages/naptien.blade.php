@extends('layout.index')
@section('content')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
@endsection
<div style="margin: 0 auto; width: 575px;">
	<h3 style="margin-bottom: 20px;"><span class="label label-primary">Nạp thẻ cào trực tuyến</span></h3>
	@if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
                @endif
	<form action="naptien/{{$user->id}}" method="post" id="fnapthe" name="fnapthe">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table class="table table-condensed table-bordered">
			<tbody>                        
				<tr>
					<td style="color: blue;font-style: italic;font-weight: bold;">Loại thẻ</td>
					<td>
						<select name="loaithe" style="width: 500px;border: 1px solid #ccc;height: 50px;">
							<?php
							$arr = array();
							$arr1 = array();
							foreach($thecao as $tc){
								$arr[] = $tc->loaithe;
							}
							$arr1 = array_unique($arr);
							foreach($arr1 as $key => $value){
								echo '<option value="'.$arr1[$key].'">'.$arr1[$key].'</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td style="color: blue;font-style: italic;font-weight: bold;">Mã thẻ</td>
					<td><input required="" type="text" value="" name="mathe" style="width: 500px;border: 1px solid #ccc;height: 50px;"/></td>
				</tr>
				<tr>
					<td style="color: blue;font-style: italic;font-weight: bold;">Seri</td>
					<td><input required="" type="text" value="" name="seri" style="width: 500px;border: 1px solid #ccc;height: 50px;"/></td>
				</tr>
				
			</tbody>
		</table>
		<center>
			<input class="btn btn-primary" type="submit" value="Nạp thẻ"/> 
			<div id="loading_napthe" style="display: none; float: center"> &nbsp;Xin mời chờ...</div><br>
			<div class="label label-success" id="msg_success_napthe"></div><br>
		</center>
	</form>
</div>
@endsection