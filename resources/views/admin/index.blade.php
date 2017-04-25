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
						<table class="table table-striped">
							<thead>
								<th>Cliente</th>
								<th>Fecha pedido</th>
								<th>Fecha entrega</th>
								<th>Dias restantes</th>
								<th>Editar</th>
							</thead>
							<tbody>
								@foreach ($pedidos as $pedido)
								<tr>
									<td>{{$pedido->cliente->nombre}}</td>
									<td>{{$pedido->created_at}}</td>
									<td>{{$pedido->entrega}}</td>
									<td>diferencia pendiente</td>
									<td>
										<a href="#" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
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
				<h5>{{$insumo->nombre}}</h5>
				<label>{{$insumo->cantidad}}</label>
			</div>
			<div class="col-md-6 top-content1">	   
				<div id="demo-pie-1" class="pie-title-center" data-percent="{{($insumo->cantidad * 100)/ $insumo->max}}"> <span class="pie-value">{{($insumo->cantidad * 100)/ $insumo->max}}%</span> </div>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
@endforeach

@foreach ($ingredientes as $ingrediente)
	<div class="col-md-5 skil" style="margin-right:10px;margin-bottom:10px;background-color:#FFB347">
		<div class="content-top-1">
			<div class="col-md-6 top-content">
				<h5>{{$ingrediente->nombre}}</h5>
				<label>{{$ingrediente->cantidad}}</label>
			</div>
			<div class="col-md-6 top-content1">	   
				<div id="demo-pie-1" class="pie-title-center" data-percent="{{($ingrediente->cantidad * 100)/ $ingrediente->max}}"> <span class="pie-value">{{($ingrediente->cantidad * 100)/ $ingrediente->max}}%</span> </div>
			</div>
			 <div class="clearfix"> </div>
		</div>
	</div>
@endforeach

<script type="text/javascript">

        $(document).ready(function () {
            $('.pie-title-center').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-4').pieChart({
                barColor: 'red',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-5').pieChart({
                barColor: 'green',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>


@endsection








