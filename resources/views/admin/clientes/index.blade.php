@extends('admin.template.main')

@section('title', 'Insumos.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Clientes
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">
					<a href="{{ route('admin.clientes.create') }}" class="btn btn-info">Registrar nuevo Cliente</a><hr>
					<div class="gantt">
						<table class="table table-striped">
							<thead>
								<th>Nombre</th>
								<th>Email</th>
								<th>Telefono</th>
								<th>Direccion</th>
							</thead>
							<tbody>
								@foreach($clientes as $cliente)
									<tr>
										<td>{{ $cliente->nombre }}</td>
										<td>{{ $cliente->email }}</td>
										<td>{{ $cliente->telefono }}</td>
										<td>{{ $cliente->direccion }}</td>
										<td>
										<a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
						
										<a href="{{ route('admin.clientes.destroy', $cliente->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
							<div class="text-center">
								{!! $clientes->render()!!}
							</div>
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>

@endsection








