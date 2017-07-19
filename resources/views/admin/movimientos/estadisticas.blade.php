@extends('admin.template.main')

@section('title', 'Movimientos.')

@section('content')

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('plugins/estadist2/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<!-- 
-->
<link href="{{asset('plugins/estadist2/css/stylemod.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('plugins/estadist2/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('plugins/estadist2/css/font.css')}}" type="text/css"/>
<link href="{{asset('plugins/estadist2/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('plugins/estadist2/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('plugins/estadist2/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('plugins/estadist2/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('plugins/estadist2/js/raphael-min.js')}}"></script>
<script src="{{asset('plugins/estadist2/js/morris.js')}}"></script>

<!--
<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Estadisticas
		</div>
			<div class="panel-body">
-->

		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Visitor Statistics</h3>
										<div class="toolbar">
											
											
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div id="hero-area"></div>
								</div>
							</div>
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>


			<div class="agile-last-grids">
				<div class="col-md-4 agile-last-left">
					<div class="agile-last-grid">
						<div class="area-grids-heading">
							<h3>Monthly</h3>
						</div>
						<div id="graph7"></div>
						<script>
						// This crosses a DST boundary in the UK.
						Morris.Area({
						  element: 'graph7',
						  data: [
							{x: '2013-03-30 22:00:00', y: 3, z: 3},
							{x: '2013-03-31 00:00:00', y: 2, z: 0},
							{x: '2013-03-31 02:00:00', y: 0, z: 2},
							{x: '2013-03-31 04:00:00', y: 4, z: 4}
						  ],
						  xkey: 'x',
						  ykeys: ['y', 'z'],
						  labels: ['Y', 'Z']
						});
						</script>

					</div>
				</div>
				<div class="col-md-4 agile-last-left agile-last-middle">
					<div class="agile-last-grid">
						<div class="area-grids-heading">
							<h3>Daily</h3>
						</div>
						<div id="graph8"></div>
						<script>
						/* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
						var day_data = [
						  {"period": "2016-10-01", "licensed": 3407, "sorned": 660},
						  {"period": "2016-09-30", "licensed": 3351, "sorned": 629},
						  {"period": "2016-09-29", "licensed": 3269, "sorned": 618},
						  {"period": "2016-09-20", "licensed": 3246, "sorned": 661},
						  {"period": "2016-09-19", "licensed": 3257, "sorned": 667},
						  {"period": "2016-09-18", "licensed": 3248, "sorned": 627},
						  {"period": "2016-09-17", "licensed": 3171, "sorned": 660},
						  {"period": "2016-09-16", "licensed": 3171, "sorned": 676},
						  {"period": "2016-09-15", "licensed": 3201, "sorned": 656},
						  {"period": "2016-09-10", "licensed": 3215, "sorned": 622}
						];
						Morris.Bar({
						  element: 'graph8',
						  data: day_data,
						  xkey: 'period',
						  ykeys: ['licensed', 'sorned'],
						  labels: ['Licensed', 'SORN'],
						  xLabelAngle: 60
						});
						</script>
					</div>
				</div>
				<div class="col-md-4 agile-last-left agile-last-right">
					<div class="agile-last-grid">
						<div class="area-grids-heading">
							<h3>Yearly</h3>
						</div>
						<div id="graph9"></div>
						<script>
						var day_data = [
						  {"elapsed": "I", "value": 34},
						  {"elapsed": "II", "value": 24},
						  {"elapsed": "III", "value": 3},
						  {"elapsed": "IV", "value": 12},
						  {"elapsed": "V", "value": 13},
						  {"elapsed": "VI", "value": 22},
						  {"elapsed": "VII", "value": 5},
						  {"elapsed": "VIII", "value": 26},
						  {"elapsed": "IX", "value": 12},
						  {"elapsed": "X", "value": 19}
						];
						Morris.Line({
						  element: 'graph9',
						  data: day_data,
						  xkey: 'elapsed',
						  ykeys: ['value'],
						  labels: ['value'],
						  parseTime: false
						});
						</script>

					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
<!--
			</div>

		</div>
	</div>
-->
@endsection

@section('js')


<script src="{{asset('plugins/estadist2/js/bootstrap.js')}}"></script>
<script src="{{asset('plugins/estadist2/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('plugins/estadist2/js/scripts.js')}}"></script>
<script src="{{asset('plugins/estadist2/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('plugins/estadist2/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('plugins/estadist2/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<script>


var elementos = [];
console.log(elementos);

@foreach ($movimientos as $movimiento)
	elementos.push({periodo:'{{$movimiento->created_at}}', importe:'{{$movimiento->importe}}', });
@endforeach
console.log(elementos);

	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: elementos,
			lineColors:['#eb6f6f'],
			xkey: 'periodo',
            redraw: true,
            ykeys: ['importe'],
            labels: ['All Visitors', 'Returning Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('plugins/estadist2/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>

@endsection