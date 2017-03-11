@extends('admin.template.main')

@section('title', 'Agregar Un Insumo'. $listaprecio->nombre)

@section('content')

<!-- lista de precio actual inicio -->

<div class="women_main">
<div class="w_content">
<div class="panel panel-widget">
	<div class="panel-title">
			Editar {{ $listaprecio->nombre }}
	</div>
	{!! Form::open(['route' =>['admin.precios.update', $listaprecio], 'method' => 'PUT']) !!}
		<div class="form-group">
			<table class="table table-striped">
				<thead>
					<th>Nombre</th>
					<th>Vigencia desde</th>
					<th>Vigencia hasta</th>
				</thead>
				<tbody>
					<tr>
						<td>{!!	Form::text('nombre',$listaprecio->nombre,['class'=>'form-control','required'])!!}</td>
						<td>{!!	Form::date('vigencia',$listaprecio->vigencia_desde,['class'=>'form-control', 'required'])!!}</td>
						<td>{!!	Form::date('vigencia',$listaprecio->vigencia_hasta,['class'=>'form-control', 'required'])!!}</td>
						<td>{!!	Form::submit('Guardar',['class' =>'btn btn-primary']) !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
	{!!Form::close()!!}

<hr>
			<table class="table table-striped">
				<thead>
					<th>Lista</th>
					<th>Porcentaje de aumento</th>
					<th></th>
				</thead>
		<tr>
			<td>{!! Form::select('lista_id', $listasprecios, null, ['class' => 'idlista', 'required']) !!}</td>
			<td>{!!	Form::number('porcentaje',null,['class'=>'porcentaje'])!!}
			</td>
			<td><button type="button" class="btn btn-danger" id="cargar">Cargar</button></td>
    		<td><button type="button" class="btn btn-danger" id="confirmar">Confirmar</button></td>
		</tr>
	</table>

<hr>
</div>

</div>


<div class="clearfix"></div>

<!-- lista de precio actual fin -->

<div class="area">
	<div class="col-md-6 chrt-two area">

	<h4>Lista de precio anterior</h4>
	<td><button type="button" class="btn btn-danger" id="pdfvieja">Cargar</button></td>

       <div id="listavieja"></div>

<!-- INICIO muestra la lista de precio seleccionada -->

{!! Form::open(['route' => ['admin.precios.show', ':LISTA_ID'], 'method' => 'POST' , 'id' => 'form-lista' ]) !!}
{!! Form::close() !!}

{!! Form::open(['route' => ['admin.precios.imprimir', ':IMPRIMIR_ID'], 'method' => 'POST' , 'id' => 'form-imprimir' ]) !!}
{!! Form::close() !!}

<!-- FIN muestra la lista de precio seleccionada-->

	</div>

	<div class="col-md-6 chrt-three">
		<h4>Lista Con aumento</h4>
		<td><button type="button" class="btn btn-danger" id="pdfnueva">Cargar</button></td>
		<div id="listanueva"></div>
	</div>

</div>

<div class="clearfix"></div>

<div id="correctorscroll">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
</div>

</div>


@endsection


@section('js')

<script type="text/javascript">

$(document).ready(function () {
	//cargo las listas de precios
	$('#cargar').click(function() {

	  var form = $('#form-lista');
	  var id_lista = $(".idlista").val();
//	  var id_lista = $('.idlista').data('id');
	  var url = form.attr('action').replace(':LISTA_ID', id_lista);
	  var porcentaje = $('.porcentaje').val();
	  var token = form.serialize();
	  console.log(porcentaje);
	  console.log(id_lista);
	  var tipo = 1;
//recupero lista vieja
	  data = {
	    token: token,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };
	  $.get(url, data, function(listavieja){
		      $('#listavieja').show();
		      $('#listavieja').fadeOut().html(listavieja).fadeIn();
	   });
	  console.log(listavieja);
//recupero lista vieja con el porcentaje de aumento
	  tipo = 2;
 	  data = {
	    token: token,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };
	  $.get(url, data, function(listanueva){
		      $('#listanueva').show();
		      $('#listanueva').fadeOut().html(listanueva).fadeIn();
	   });
	  	console.log(listanueva);

	});

	$('#pdfvieja').click(function() {

	  var form = $('#form-imprimir');
	  var id_lista = $(".idlista").val();
//	  var id_lista = $('.idlista').data('id');
	  var url = form.attr('action').replace(':IMPRIMIR_ID', id_lista);
	  var porcentaje = $('.porcentaje').val();
	  var token = form.serialize();
	  console.log(porcentaje);
	  console.log(id_lista);
	  var tipo = 1;
//recupero lista vieja
	  data = {
	    token: token,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };

    var imprimir = $.ajax({
         type: "POST", // define the type of HTTP verb we want to use (POST for our form)
         url: url, // the url where we want to POST
         data: data, // the url where we want to POST, set in variable above
         dataType: "json", // what type of data do we expect back from the server
         encode          : true
    });


	  imprimir.done(function(data){
	  		console.log(data);
		      Location.href = 'print';
	   });

	  console.log(listavieja);
	});

	$('#pdfnueva').click(function() {
//recupero lista vieja con el porcentaje de aumento

	  var form = $('#form-imprimir');
	  var id_lista = $(".idlista").val();
//	  var id_lista = $('.idlista').data('id');
	  var url = form.attr('action').replace(':IMPRIMIR_ID', id_lista);
	  var porcentaje = $('.porcentaje').val();
	  var token = form.serialize();
	  var tipo = 2;
	  console.log(porcentaje);
	  console.log(id_lista);
 	  data = {
	    token: token,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };

    var imprimir = $.ajax({
         type: "POST", // define the type of HTTP verb we want to use (POST for our form)
         url: url, // the url where we want to POST
         data: data, // the url where we want to POST, set in variable above
         dataType: "json", // what type of data do we expect back from the server
         encode          : true
    });


	  imprimir.done(function(data){
	  		console.log(data);
		      Location.href = 'print';
	   });

	  	console.log(listanueva);
	});

});

</script>

@endsection