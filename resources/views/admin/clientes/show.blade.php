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
						<td><a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a>
							<a href="{{ route('admin.clientes.destroy', $cliente->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
						</td>

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
								<th>Fecha pedido</th>
								<th>Fecha entrega</th>
								<th>Dias restantes</th>
								<th>Importe</th>
								<th>Cobrado</th>
								<th>Debe</th>
								<th>Estado</th>
								<th>Cobranza</th>
							</thead>
							<tbody>
								@foreach ($pedidos as $pedido)
									<?php $cobrado = 0; ?>
								@if ($pedido->estado == 'confirmado')
									<tr>
								@else
									@if ($pedido->estado == 'a entregar')
										<tr>
									@else
										<tr>
									@endif

								@endif
								
									<td>
									{{ $pedido->created_at->format('d/m/Y') }}
									</td>
<!--									{{ Carbon\Carbon::parse($pedido->entrega)->format('d/m/Y') }} -->
									<td>{{Carbon\Carbon::parse($pedido->entrega)->format('d/m/Y')}}</td>
									</td>
									<td>{{ Carbon\Carbon::parse($pedido->entrega)->diffInDays(Carbon\Carbon::parse($sysdate)) }}</td>
									<td>${{$pedido->importe}}</td>
									<td>$
										@foreach($pedido->cobranzas as $cobranza)
											<?php  $cobrado += $cobranza->importe ?>
										@endforeach
										{{$cobrado}}
									</td>
									<td style="color:#ff3333"> $ {{$pedido->importe - $cobrado}}</td>
                                    <td>
                                    @if ($pedido->estado == 'confirmado')
                                            <span class="label label-warning">{{$pedido->estado}}</span>
                                    @else
                                        @if ($pedido->estado == 'a entregar')
                                            <span class="label label-primary">{{$pedido->estado}}</span>
                                        @else
                                            @if ($pedido->estado == 'pendiente')
                                                <span class="label label-danger">{{$pedido->estado}}</span>
                                            @else
                                                <!--Entregado-->
                                                <span class="label label-success">{{$pedido->estado}}</span>
                                            @endif
                                        @endif
                                    @endif
                                    </td>
                                    <td>
                                        @if ($pedido->cobranza == 'debe')
                                            <span class="label label-danger">{{$pedido->cobranza}}</span>
                                        @else
                                            <span class="label label-success">{{$pedido->cobranza}}</span>
                                        @endif
                                        </td>
									<td>
										<a href="{{ route('admin.pedidos.edit', $pedido->id) }}" class="btn btn-warning">Pedido</a>
									</td>
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