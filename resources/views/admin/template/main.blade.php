<!DOCTYPE HTML>
<html>
<head>
	<title> @yield('title', 'Default') |Panel de Administracion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,3); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{asset('plugins/gretong-admin/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('plugins/gretong-admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{asset('plugins/gretong-admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="{{asset('plugins/gretong-admin/css/icon-font.min.css')}}" type='text/css' />
<script src="{{asset('plugins/gretong-admin/js/amcharts.js')}}"></script>	
<script src="{{asset('plugins/gretong-admin/js/serial.js')}}"></script>	
<script src="{{asset('plugins/gretong-admin/js/light.js')}}"></script>	
<!-- //lined-icons -->
<script src="{{asset('plugins/gretong-admin/js/jquery-1.10.2.min.js')}}"></script>
   <!--pie-chart-->
<script src="{{asset('plugins/gretong-admin/js/pie-chart.js')}}" type="text/javascript"></script>

</head> 
<body>
   <div class="page-container sidebar-collapsed">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			@include('admin.template.partials.header')
		<!-- //header-ends -->
				
				<!--content-->
			<div class="content">
					@include('flash::message')
					@include('admin.template.partials.errors')
					
					@yield('content')
			
						<!--//area-->
							
						<div class="clearfix"></div>
			</div>


			<!--content-->
		</div>
		
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
			@include('admin.template.partials.nav2')

			@yield('js')
<!--js -->
<script src="{{asset('plugins/gretong-admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('plugins/gretong-admin/js/scripts.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('plugins/gretong-admin/js/bootstrap.min.js')}}"></script>
<!-- /Bootstrap Core JavaScript -->
<!-- real-time -->
<!-- /real-time -->
 <script src="{{asset('plugins/gretong-admin/js/menu_jquery.js')}}"></script>
</body>
</html>