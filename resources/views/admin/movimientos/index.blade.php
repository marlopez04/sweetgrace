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
							<th>HASTA</th>
							<th>BUSCAR</th>
						</thead>
						<tbody>
							<tr>
								<td>{!! Form::select('periodo1', $saldos, null, ['class' => 'form-control select-category', 'required']) !!}
								</td>
								<td>
									{!! Form::select('periodo2', $saldos, null, ['class' => 'form-control select-category', 'required']) !!}
								</td>
								<td><a href="#" class="btn btn-info">Buscar</a></td>
							</tr>
						</tbody>
					</table>

					<div class="gantt">
						<h4>Movimientos Confirmados</h4>
						<h4 align="right">SALDO ANTERIR ${{ $saldo }}</h4>
						<table class="table table-striped">
							<thead>
								<th>Usuario</th>
								<th>Fecha</th>
								<th>Detalle</th>
								<th>Ingreso</th>
								<th>Egreso</th>
								<th>saldo</th>
								<th>Editar</th>
							</thead>
							<tbody>
								@foreach($movimientos as $movimiento)
									<tr>
										<td>{{ $movimiento->user->name }}</td>
										<td>{{ date("d-m-Y", strtotime($movimiento->created_at)) }}</td>
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
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>

@endsection








