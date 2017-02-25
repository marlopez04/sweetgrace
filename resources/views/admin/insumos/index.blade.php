@extends('admin.template.main')

@section('title', 'Insumos.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Insumos	  
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">
					<a href="{{ route('admin.insumos.create') }}" class="btn btn-info">Registrar nuevo insumo</a><hr>
					<div class="gantt">
						<table class="table table-striped">
							<thead>
								<th>Nombre</th>
								<th>Costo</th>
								<th>Cantidad</th>
								<th>StockCritico</th>
								<th>Editar</th>
							</thead>
							<tbody>
								@foreach($insumos as $insumo)
									<tr>
										<td>{{ $insumo->nombre }}</td>
										<td>{{ $insumo->cantidad }}</td>
										<td>{{ $insumo->stockcritico }}</td>
										<td>{{ $insumo->unidad }}</td>
										<td>{{ $insumo->costo_u }}</td>
										<td>
										<a href="{{ route('admin.insumos.edit', $insumo->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
						
										<a href="{{ route('admin.insumos.destroy', $insumo->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
							<div class="text-center">
								{!! $insumos->render()!!}
							</div>
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>

@endsection








