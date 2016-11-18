<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Cooks a Hotels and Restaurants Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cooks Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{asset('plugins/cooks-web/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('plugins/cooks-web/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="{{asset('plugins/cooks-web/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<!-- animation-effect -->
<link href="{{asset('plugins/cooks-web/css/animate.min.css')}}" rel="stylesheet"> 
<script src="{{asset('plugins/cooks-web/js/wow.min.js')}}"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Alex+Brush' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- header -->
	<div class="header">
		<div class="container">
			@include('front.template.partials.nav')
		</div>
	</div>
<!-- header -->
		@yield('content')
<!-- //newsletter-bottom -->
		@include('front.template.partials.footer')
<!-- for bootstrap working -->
	<script src="{{asset('plugins/cooks-web/js/bootstrap.js')}}"></script>
<!-- //for bootstrap working -->
</body>
</html>