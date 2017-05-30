@extends('admin.template.main')

@section('title', 'Pedidos pendientes.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Pedidos Pendientes	  
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">									
					<div class="gantt">
						<table class="table table-hover table-striped">
							<thead>
								<th>Editar /Cliente</th>
								<th>Fecha pedido</th>
								<th>Fecha entrega</th>
								<th>Dias restantes</th>
								<th>Importe</th>
								<th>Cobrado</th>
								<th>Debe</th>
								<th>Estado</th>
								<th>Guardar</th>
							</thead>
							<tbody>
								@foreach ($pedidos as $pedido)
									{!! $cobrado = 0 !!}
								@if ($pedido->estado == 'confirmado')
									<tr class="table-warning">
								@else
									@if ($pedido->estado == 'a entregar')
										<tr class="table-success">
									@else
										<tr class="table-danger">
									@endif

								@endif
								
									<td>
										<a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a>

										{{$pedido->cliente->nombre}}
									</td>
									<td>
									{{ $pedido->created_at->format('d/m/Y') }}
									</td>
<!--									{{ Carbon\Carbon::parse($pedido->entrega)->format('d/m/Y') }} -->
									<td>{{Carbon\Carbon::parse($pedido->entrega)->format('d/m/Y')}}</td>
									</td>
									<td>{{ $pedido->created_at->diffInDays(Carbon\Carbon::parse($pedido->entrega)) }}</td>
									<td>${{$pedido->importe}}</td>
									<td>$
										@foreach($pedido->cobranzas as $cobranza)
											<?php  $cobrado += $cobranza->importe ?>
										@endforeach
										{{$cobrado}}
									</td>
									<td style="color:#ff3333"> $ {{$pedido->importe - $cobrado}}</td>
									<td>{{$pedido->estado}}</td>
									<td>
										<a href="#" class="btn btn-warning">Pedido</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
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
@endforeach

@foreach ($ingredientes as $ingrediente)
	<div class="col-md-5 skil" style="margin-right:10px;margin-bottom:10px;background-color:#FFB347">
		<div class="content-top-1">
			<div class="col-md-6 top-content">
				<h5><a href="{{ route('admin.ingredientes.edit', $ingrediente->id) }}"> {{$ingrediente->nombre}}</a></h5>
				<label>{{$ingrediente->cantidad}}</label>
			</div>
			<div class="col-md-6 top-content1">	   
				@if( (($ingrediente->cantidad * 100)/ $ingrediente->max) >= 70 )
					<div id="demo-pie-1" class="pie-title-center verde" data-percent="{{($ingrediente->cantidad * 100)/ $ingrediente->max}}"> <span class="pie-value">{{($ingrediente->cantidad * 100)/ $ingrediente->max}}%</span> </div>
				@else
					@if( (($ingrediente->cantidad * 100)/ $ingrediente->max) > 30 )
						<div id="demo-pie-1" class="pie-title-center naranja" data-percent="{{($ingrediente->cantidad * 100)/ $ingrediente->max}}"> <span class="pie-value">{{($ingrediente->cantidad * 100)/ $ingrediente->max}}%</span> </div>
					@else
						<div id="demo-pie-1" class="pie-title-center rojo" data-percent="{{($ingrediente->cantidad * 100)/ $ingrediente->max}}"> <span class="pie-value">{{($ingrediente->cantidad * 100)/ $ingrediente->max}}%</span> </div>
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








