<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sign In Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- js -->
<script src="{{asset('plugins/login/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<link href="{{asset('plugins/login/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="main">
		<h1>Sweet Grace</h1>
		<div class="w3_login">
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle">
				  </div>
				  <div class="form">
					<h2>Iniciar Sesión</h2>
					{!! Form::open(['route'=>'admin.auth.login', 'method' => 'POST']) !!}
					  {!! Form::text('username', null,['class' => 'form-control', 'placeholder' => 'nombre de usuario'])!!}
					  {!! Form::password('password', ['class' =>'form-control', 'placeholder' => '*********'])!!}
					  {!! Form::submit('Acceder', ['class' => 'btn btn-primary'])!!}
					{!! Form::close()!!}
				  </div>
				  <div class="cta"></div>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>