<!DOCTYPE html>
<html>
<head>

		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title></title>
{{-- 	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> --}}

	<style>
* {
/*font-family: "DejaVu Sans","ariblk", "monospace","Times-Roman";
*/
font-family: DejaVu Sans !important;

}

</style>
</head>
<body>

	<h1 style="color: blue;">{!! $baihoc->description !!}</h1>
	<div class="col-lg-12" style="border: 1px solid #dddddd; padding: 0px;margin-top: 10px;">
		{!!$baihoc->content!!}
	</div>

</body>
</html>