<?php $saldo2 = $saldoactual2; ?>
<?php $ingresos2 = 0; ?>
<?php $egresos2 = 0; ?>

	<h4 align="right">SALDO ANTERIR ${{ $saldo2 }}</h4>
	<table class="table table-striped">
		<thead>
			<th>Usuario</th>
			<th>Fecha</th>
			<th>Detalle</th>
			<th>Ingreso</th>
			<th>Egreso</th>
			<th>Saldo</th>
			<th>Editar</th>
		</thead>
		<tbody>
			@foreach($movimientos2 as $movimiento2)
				<tr>
					<td>{{ $movimiento2->user->name }}</td>
					<td>{{ date("d-m-Y", strtotime($movimiento2->created_at)) }}</td>
					<td>{{ $movimiento2->detalle }}</td>
					@if ($movimiento2->tipo == 'ingreso')
					<td>${{ $movimiento2->importe }}</td>
					<?php $ingresos2 = $ingresos2 + $movimiento2->importe; ?>
					<td>-----</td>
					@else
					<td>-----</td>
					<td>${{ $movimiento2->importe }}</td>
					<?php $egresos2 = $egresos2 + $movimiento2->importe; ?>
					@endif
					<td>
						@if ($movimiento2->tipo == 'ingreso')
						${{ $saldo2 = $saldo2 + $movimiento2->importe }}
						@else
						${{ $saldo2 = $saldo2 - $movimiento2->importe }}
						@endif
					</td>
					<td>
					<a href="{{ route('admin.movimientos.edit', $movimiento2->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
	
					<a href="{{ route('admin.stocks.destroy', $movimiento2->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
					</td>
				</tr>
			@endforeach
			<tr>
				<td></td>							
				<td></td>
				<th>TOTAL</th>
				<td>${{$ingresos2}}</td>
				<td>${{$egresos2}}</td>
				<td>${{$saldo2}}</td>
				<td></td>
			</tr>
		</tbody>
	</table>
		<div class="text-center">
		</div>


