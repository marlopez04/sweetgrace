@extends('admin.template.main')

@section('title', 'Cliente'. $cliente->nombre)

@section('content')

<!-- lista de precio actual inicio -->

<div class="women_main">
<div class="w_content">
<div class="panel panel-widget">
	<div class="panel-title">
			Cliente {{ $cliente->nombre }}
	</div>
	{!!	Form::hidden('id',$cliente->id,['class'=>'id_lista_actual'])!!}
		<div class="form-group">
			<table class="table table-striped">
				<thead>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Email</th>
					<th>Editar</th>
				</thead>
				<tbody>
					<tr>
						<td>{{$cliente->nombre}}</td>
						<td>{{$cliente->telefono}}</td>
						<td>{{$cliente->direccion}}</td>
						<td>{{$cliente->email}}</td>
						<td><a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a></td>
					</tr>
				</tbody>
			</table>
		</div>
	{!!Form::close()!!}
	<div>

	<div class="panel-title">
			Pedidos
	</div>

	<?php $debe = 0; ?>
	<?php $cobrado = 0; ?>

						<table class="table table-hover table-striped">
							<thead>
								<th>Editar</th>
								<th>Fecha pedido</th>
								<th>Fecha entrega</th>
								<th>Dias restantes</th>
								<th>Importe</th>
								<th>Cobrado</th>
								<th>Debe</th>
								<th>Estado</th>
							</thead>
							<tbody>
								@foreach ($pedidos as $pedido)
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
									</td>
									<td>
									{{ $pedido->created_at->format('d/m/Y') }}
									</td>
									<td> {{ Carbon\Carbon::parse($pedido->entrega)->format('d/m/Y') }}</td>
									</td>
									<td>
										@if ($pedido->estado == 'entregado')
											ENTREGADO
										@else
											{{ $sysdate->diffInDays(Carbon\Carbon::parse($pedido->entrega)) }}</td>
										@endif
									<td>${{$pedido->importe}}</td>
									<td>$
										<?php $cobrado = 0; ?>
										@foreach($pedido->cobranzas as $cobranza)
										<?php $cobrado = $cobrado + $cobranza->importe; ?>
										@endforeach
										{{$cobrado}}
									</td>
									<td style="color:#ff3333">${{$pedido->importe - $cobrado}}</td>
									<td>{{$pedido->estado}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>


	</div>

</div>
</div>
</div>

<div class="clearfix"></div>



@endsection


@section('js')

@endsection