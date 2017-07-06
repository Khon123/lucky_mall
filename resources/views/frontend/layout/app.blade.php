<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Lucky Mall :: {{ $title }}</title>
	
	<!-- Bootstrap Core CSS -->
	<link href="{{ asset('frontend/images/LUCKYMALL_LOGO_FINAL.png') }}" rel="shortcut icon">
	<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/hover.css') }}" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="{{ asset('frontend/css/half-slider.css') }}" rel="stylesheet">
	
	@yield('after_styles')

</head>

<body style="background:#ddd;">

@include('frontend.inc.menu')

@include('frontend.inc.slider')
@yield('content')

@include('frontend.inc.footer')
<!-- jQuery -->
	<script src="{{ asset('frontend/js/jquery.js') }}"></script>
	
	<!-- Bootstrap Core JavaScript -->
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- Script to Activate the Carousel -->
	
	<script>
	    $('.carousel').carousel({
	
	        interval: 3000 //changes the speed
	    })
	</script>

	@yield('after_scripts')

</body>

</html>
