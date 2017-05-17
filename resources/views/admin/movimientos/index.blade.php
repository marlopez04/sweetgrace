@extends('admin.template.main')

@section('title', 'Movimientos.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Listas de Movimientos Contables
		</div>
			<div class="panel-body">
				<?php $saldo = $saldoactual; ?>
				<?php $ingresos = 0; ?>
				<?php $egresos = 0; ?>
				<!-- status -->
				<div class="contain">
					<a href="{{ route('admin.movimientos.create') }}" class="btn btn-info">Nueva Movimiento</a><hr>
					
					<table class="table table-striped">
						<thead>
							<th>DESDE</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>HASTA</th>
							<th>BUSCAR</th>
						</thead>
						<tbody>
							<tr>
								<td colspan='5'>{!! Form::select('periodo1', $saldos, null, ['id' => 'periodo1']) !!}
								</td>
								<td>
									{!! Form::select('periodo2', $saldos, null, ['id' => 'periodo2']) !!}
								</td>
								<td><button type="button" class="btn btn-danger" id="cargar">Buscar</button></td>
							</tr>
						</tbody>
					</table>

					<div class="gantt">
						<h4>Movimientos Confirmados</h4>
						<div id="reporteinicial"> <!--Reporte al cargar la pagina, cambia al elegir otro periodo, INICIO-->
						<h4 align="right">SALDO ANTERIOR ${{ $saldo }} {{ $periodoinicial }}</h4>
						<table class="table table-striped">
							<thead>
								<th>Usuario</th>
								<th>Fecha</th>
								<th>Periodo</th>
								<th>Detalle</th>
								<th>Ingreso</th>
								<th>Egreso</th>
								<th>Saldo</th>
								<th>Editar</th>
							</thead>
							<tbody>
								@foreach($movimientos as $movimiento)
									<tr>
										<td>{{ $movimiento->user->name }}</td>
										<td>{{ date("d-m-Y", strtotime($movimiento->created_at)) }}</td>
										<td>{{ $movimiento->periodo }}</td>
										<td>{{ $movimiento->detalle }}</td>
										@if ($movimiento->tipo == 'ingreso')
										<td>${{ $movimiento->importe }}</td>
										<?php $ingresos = $ingresos + $movimiento->importe; ?>
										<td>-----</td>
										@else
										<td>-----</td>
										<td>${{ $movimiento->importe }}</td>
										<?php $egresos = $egresos + $movimiento->importe; ?>
										@endif
										<td>
											@if ($movimiento->tipo == 'ingreso')
											${{ $saldo = $saldo + $movimiento->importe }}
											@else
											${{ $saldo = $saldo - $movimiento->importe }}
											@endif
										</td>
										<td>
										<a href="{{ route('admin.movimientos.edit', $movimiento->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
						
										<a href="{{ route('admin.stocks.destroy', $movimiento->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
										</td>
									</tr>
								@endforeach
								<tr>
									<td></td>							
									<td></td>
									<th>TOTAL</th>
									<td>${{$ingresos}}</td>
									<td>${{$egresos}}</td>
									<td>${{$saldo}}</td>
									<td></td>
								</tr>
							</tbody>
						</table>
							<div class="text-center">
							</div>
						  </div> <!--div contenido de carga, se cierra al pedir otro intervalo de periodos que no sea el periodo actual FIN -->
						  <div id="reporteintervalo"></div>
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>

{!! Form::open(['route' => ['admin.movimientos.intervalo', 'ID'], 'method' => 'POST' , 'id' => 'form-intervalo' ]) !!}
{!! Form::close() !!}

<div id="correctorscroll">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>


@endsection


@section('js')

<script type="text/javascript">

$(document).ready(function () {

	// Carga el intervalo requerido por el usuario

	$('#cargar' ).click(function() {
	  var form = $('#form-intervalo');
	  var periodo1 = $('#periodo1').val();
	  var periodo2 = $('#periodo2').val();
	  var url = form.attr('action').replace(':ID', periodo1);
	  console.log(periodo1);
	  console.log(periodo2);
	  var token = form.serialize();
	  data = {
	    token: token,
	    periodo1: periodo1,
	    periodo2: periodo2
	  };
	  $.get(url, data, function(intervalo){
		      $('#reporteinicial').hide();
		      $('#reporteintervalo').show();
		      $('#reporteintervalo').fadeOut().html(intervalo).fadeIn();
	   }); //FIN RETORNO DE AJAX

	 }); // FIN CARGAR

}); // FIN DOCUMENT READY

</script>


@endsection




