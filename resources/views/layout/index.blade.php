<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E-learning</title>
	<base href="{{asset('')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />


	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="giaodien/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="giaodien/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="giaodien/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="giaodien/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="giaodien/css/owl.carousel.min.css">
	<link rel="stylesheet" href="giaodien/css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="giaodien/css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="giaodien/css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="giaodien/css/style.css">

	<!-- Modernizr JS -->
	<script src="giaodien/js/modernizr-2.6.2.min.js"></script>
	 @yield('css')
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
	<script src="giaodien/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="giaodien/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="giaodien/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="giaodien/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="giaodien/js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="giaodien/js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="giaodien/js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="giaodien/js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="giaodien/js/jquery.magnific-popup.min.js"></script>
	<script src="giaodien/js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="giaodien/js/simplyCountdown.js"></script>
	
	<!-- Main -->
	<script src="giaodien/js/main.js"></script>
	<script>
		var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
    	year: d.getFullYear(),
    	month: d.getMonth() + 1,
    	day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
    	year: d.getFullYear(),
    	month: d.getMonth() + 1,
    	day: d.getDate(),
    	enableUtc: false
    });
</script>
	<div class="fh5co-loader"></div>
	
	<div id="page">
		@include('layout.header')
		
		@yield('slide')

		@yield('content')
	</div>
	@include('layout.footer')
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<!-- jQuery -->
	{{-- <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script> --}}

@yield('script')
</body>
</html>

