<?php $saldo2 = $saldoactual2; ?>
<?php $ingresos2 = 0; ?>
<?php $egresos2 = 0; ?>

	<h4 align="right">SALDO ANTERIOR ${{ $saldo2 }} {{ $periodoinicial2 }}</h4>
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
			@foreach($movimientos2 as $movimiento2)
				<tr>
					<td>{{ $movimiento2->user->name }}</td>
					<td>{{ date("d-m-Y", strtotime($movimiento2->created_at)) }}</td>
					<td>{{ $movimiento2->periodo }}</td>
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
					@if ($movimiento2->relacion == 'pedido')
						<a href="{{ route('admin.pedidos.edit', $movimiento2->cobranzas->pedido_id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
						@else
							@if ($movimiento2->relacion == 'stock')
								<a href="{{ route('admin.stocks.edit', $movimiento2->stocks->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
							@else
								<a href="{{ route('admin.movimientos.edit', $movimiento2->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
							@endif
						@endif
					</td>
				</tr>
			@endforeach
			<tr>
				<td></td>							
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


