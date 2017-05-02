@extends('admin.template.main')

@section('title', 'Pedidos pendientes.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			INSUMOS	  
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">									
					<div class="gantt">
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>

<!-- insumos inicio -->
@foreach ($insumos as $insumo)
	<div class="col-md-5 skil" style="margin-right:10px;margin-bottom:10px;background-color:#B393B5">
		<div class="content-top-1">
			<div class="col-md-6 top-content">
				<h5>{{$insumo->nombre}}</h5>
				<label>{{$insumo->cantidad}}</label>
			</div>
			<div class="col-md-6 top-content1">	   
				@if( (($insumo->cantidad * 100)/ $insumo->max) >= 70 )
					<div id="demo-pie-1" class="pie-title-center verde" data-percent="{{($insumo->cantidad * 100)/ $insumo->max}}"> <span class="pie-value">{{($insumo->cantidad * 100)/ $insumo->max}}%</span> </div>
				@else
					@if( (($insumo->cantidad * 100)/ $insumo->max) > 30 )
						<div id="demo-pie-1" class="pie-title-center naranja" data-percent="{{($insumo->cantidad * 100)/ $insumo->max}}"> <span class="pie-value">{{($insumo->cantidad * 100)/ $insumo->max}}%</span> </div>
					@else
						<div id="demo-pie-1" class="pie-title-center rojo" data-percent="{{($insumo->cantidad * 100)/ $insumo->max}}"> <span class="pie-value">{{($insumo->cantidad * 100)/ $insumo->max}}%</span> </div>
					@endif
				@endif
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
@endforeach

<script type="text/javascript">

        $(document).ready(function () {
            $('.pie-title-center.rojo').pieChart({
                barColor: '#ff3333',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('.pie-title-center.verde').pieChart({
                barColor: '#00cc00',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('.pie-title-center.naranja').pieChart({
                barColor: '#ff8533',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });
           
        });

    </script>


@endsection








