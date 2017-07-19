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
						<a href="{{ route('admin.insumos.create') }}" class="btn btn-info">Registrar nuevo insumo</a>
						</div>
<!-- busca ingrediente -->
                {!! Form::open(['route' => 'admin.insumos.index', 'method' => 'GET', 'class' => 'navbar-form pull-left'])!!}
                <div class="input-group">
                  {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar insumo..', 'aria-describedby' => 'search'])!!}
                  <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span></span>
                </div>
              {!! Form::close() !!}

				</div>
			</div>
			<!-- status -->
		</div>
	</div>

<!-- insumos inicio -->
<table>
	<?php $elementos = 0 ?>
@foreach ($insumos as $insumo)
<!--
	@if($elementos ==0 or $elementos ==3)
		<tr>
	@endif
		<td>
-->
	<div class="col-md-5 skil" style="margin-right:10px;margin-bottom:10px;background-color:#B393B5">
		<div class="content-top-1">
			<div class="col-md-6 top-content">
				<h5><a href="{{ route('admin.insumos.edit', $insumo->id) }}"> {{$insumo->nombre}}</a></h5>
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
		<?php $elementos++  ?>
<!--
		</td>
	@if($elementos == 3 or $elementos == 6 or $elementos == 9 or $elementos == 12)
            
    @endif
-->
@endforeach
</table>


		<div class="clearfix"> </div>
		<div class="text-center">
			{!! $insumos->render()!!}
		</div>

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








