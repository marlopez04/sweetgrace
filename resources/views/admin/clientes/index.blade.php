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
<!-- busca cliente -->
                {!! Form::open(['route' => 'admin.clientes.index', 'method' => 'GET', 'class' => 'navbar-form pull-left'])!!}
                <div class="input-group">
                  {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar cliente..', 'aria-describedby' => 'search'])!!}
                  <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span></span>
                </div>
              {!! Form::close() !!}

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








