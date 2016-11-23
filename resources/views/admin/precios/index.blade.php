@extends('admin.template.main')

@section('title', 'Insumos.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Listas de Precios
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">
					<a href="{{ route('admin.precios.create') }}" class="btn btn-info">Nueva lista de Precios</a><hr>
					<div class="gantt">
						<table class="table table-striped">
							<thead>
								<th>Nombre</th>
								<th>Vigencia desde</th>
								<th>Vigencia hasta</th>
								<th>Editar</th>
							</thead>
							<tbody>
								@foreach($listasprecios as $listaprecio)
									<tr>
										<td>{{ $listaprecio->nombre }}</td>
										<td>{{ date("d-m-Y", strtotime($listaprecio->vigencia_desde)) }}</td>
										<td>{{ date("d-m-Y", strtotime($listaprecio->vigencia_hasta)) }}</td>
										<td>
										<a href="{{ route('admin.precios.edit', $listaprecio->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
						
										<a href="{{ route('admin.precios.destroy', $listaprecio->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
							<div class="text-center">
								{!! $listasprecios->render()!!}
							</div>
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>

@endsection








