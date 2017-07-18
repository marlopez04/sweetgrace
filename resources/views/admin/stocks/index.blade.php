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
					<a href="{{ route('admin.stocks.create') }}" class="btn btn-info">Nuevo Stock</a><hr>
					<button type="button" class="btn btn-danger" id="imprimir">Imprimir Stock Total</button>
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

{!! Form::open(['route' => ['admin.stocks.imprimir', ':IMPRIMIR_ID'], 'method' => 'POST' , 'id' => 'form-imprimir' ]) !!}
{!! Form::close() !!}


@endsection


@section('js')

<script type="text/javascript">

$(document).ready(function () {
	//cargo las listas de precios

	$('#imprimir').click(function() {
	  var form = $('#form-imprimir');
	  var token = form.serialize();

   var url = form.attr('action').replace(':IMPRIMIR_ID', 1);

 	  var form_data = {
	    token: token
	  };

       $.get(url, form_data, function(res){
       		window.open(res,'_blank');
       });

    });


});

function downloadURL(url) {
    if( $('#idown').length ){
        $('#idown').attr('src',url);
    }else{
        $('<iframe>', { id:'idown', src:url,'style':'height:50px;overflow:scroll' }).hide().appendTo('body');
    }
}
</script>

@endsection






