@extends('admin.template.main')

@section('title', 'Insumos.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Ingredientes	  
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">
					<a href="{{ route('admin.ingredientes.create') }}" class="btn btn-info">Registrar nuevo ingrediente</a><hr>
					<div class="gantt">
						<table class="table table-striped">
							<thead>
								<th>Nombre</th>
								<th>Cantidad</th>
								<th>StockCritico</th>
								<th>Editar</th>
							</thead>
							<tbody>
								@foreach($ingredientes as $ingrediente)
									<tr>
										<td>{{ $ingrediente->nombre }}</td>
										<td>{{ $ingrediente->cantidad }}</td>
										<td>{{ $ingrediente->stockcritico }}</td>
										<td>{{ $ingrediente->unidad }}</td>
										<td>{{ $ingrediente->custo_u }}</td>
										<td>
										<a href="{{ route('admin.ingredientes.edit', $ingrediente->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
						
										<a href="{{ route('admin.ingredientes.destroy', $ingrediente->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
							<div class="text-center">
								{!! $ingredientes->render()!!}
							</div>
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>

@endsection








