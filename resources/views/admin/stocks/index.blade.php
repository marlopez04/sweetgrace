@extends('admin.template.main')

@section('title', 'Insumos.')

@section('content')

<div class="monthly-grid">
	<div class="panel panel-widget">
		<div class="panel-title">
			Listas de Stock
		</div>
			<div class="panel-body">
				<!-- status -->
				<div class="contain">
					<a href="{{ route('admin.stocks.create') }}" class="btn btn-info">Nueva Stock</a><hr>
					<div class="gantt">
						<table class="table table-striped">
							<thead>
								<th>usuario</th>
								<th>tipo</th>
								<th>estado</th>
								<th>Fecha</th>
								<th>Editar</th>
							</thead>
							<tbody>
								@foreach($stocks as $stock)
									<tr>
										<td>{{ $stock->user->name }}</td>
										<td>{{ $stock->tipo }}</td>
										<td>{{ $stock->estado }}</td>
										<td>{{ date("d-m-Y", strtotime($stock->created_at)) }}</td>
										<td>
										<a href="{{ route('admin.stocks.edit', $stock->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"></span></a>
						
										<a href="{{ route('admin.stocks.destroy', $stock->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
							<div class="text-center">
								{!! $stocks->render()!!}
							</div>
						</div>
				</div>
			</div>
			<!-- status -->
		</div>
	</div>

@endsection








