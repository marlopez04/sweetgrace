@extends('admin.template.main')

@section('title', 'Clientes.')

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
										<td>
											<a href="{{ route('admin.clientes.show', $cliente->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
											{{ $cliente->nombre }}
										</td>
										<td>{{ $cliente->email }}</td>
										<td>{{ $cliente->telefono }}</td>
										<td>{{ $cliente->direccion }}</td>
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








