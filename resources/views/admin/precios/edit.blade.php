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

{!! Form::open(['route' => ['admin.precios.imprimir', ':IMPRIMIR_ID', '1', ':PORCENTAJE'], 'method' => 'POST' , 'id' => 'form-imprimir1' ]) !!}
<!--
{!!	Form::hidden('tipo','',['class'=>'form-control', 'id' => 'tipo-vieja'])!!}
{!!	Form::hidden('porcentaje',null,['class'=>'form-control', 'id' => 'tipo-nueva'])!!}
-->
{!!	Form::submit('Imprimir',['class' =>'btn btn-primary']) !!}

<a href="#" id = 'imprimir1'>Editar</a>

{!! Form::close() !!}
     <div id="listavieja"></div>



<!-- INICIO muestra la lista de precio seleccionada -->

{!! Form::open(['route' => ['admin.precios.show', ':LISTA_ID'], 'method' => 'POST' , 'id' => 'form-lista' ]) !!}
{!! Form::close() !!}

<!-- FIN muestra la lista de precio seleccionada-->

<!--
{!! Form::open(['route' => ['admin.precios.imprimir', ':IMPRIMIR_ID', ':TIPO', ':PORCENTAJE'], 'method' => 'POST' , 'id' => 'form-imprimir' ]) !!}
{!! Form::close() !!}
-->

	</div>

	<div class="col-md-6 chrt-three">
		<h4>Lista Con aumento</h4>
		<td><button type="button" class="btn btn-danger" id="pdfnueva">Cargar</button></td>
		{!! Form::open(['route' => ['admin.precios.imprimir', ':ID_IMPRIMRI', 2 , ':PORCENTAJE'], 'method' => 'POST' , 'id' => 'form-imprimir2' ]) !!}
		<!--
		{!!	Form::hidden('tipo','',['class'=>'form-control', 'id' => 'tipo-vieja'])!!}
		{!!	Form::hidden('porcentaje',null,['class'=>'form-control', 'id' => 'tipo-nueva'])!!}
		-->
		{!!	Form::submit('Imprimir',['class' =>'btn btn-primary']) !!}
		{!! Form::close() !!}

		<a href="#" id = 'imprimir2'>Editar222</a>

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
	  var porcentaje = $('.porcentaje').val();

	  var url = form.attr('action').replace(':LISTA_ID', id_lista);
//para imprimir form2 lista vieja, form3 lista nueva
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

	$('#imprimir2').click(function() {
	  var id_lista = $(".idlista").val();
//	  var id_lista = $('.idlista').data('id');
	  var porcentaje = $('.porcentaje').val();
	  console.log(porcentaje);
	  console.log(id_lista);
	  var tipo = 1;
//recupero lista vieja

	   var form = $('#form-imprimir2');

//       var parametros = "/"+id_lista+"/"+tipo+"/"+porcentaje+"";

//	   form.attr('action').replace(':PORCENTAJE', porcentaje);
//	   var url = form.attr('action').replace(':PARAMETROS', id_lista);
	   var url = form.attr('action').replace(':IMPRIMIR_ID', id_lista);

//       var url = "/precio/"+id_lista+"/"+tipo+"/"+porcentaje+"";
       
         location.href = url

		console.log(url);
/*
 	  data = {
	    token: token,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };
*/
       $.ajax(url).success(function(response){console.log("OK")});

/*

       $.ajax({url:'PrecioController/imprimir',
       	data:{'id': $id_lista,
       		  'tipo': $tipo,
       		  'porcentaje': $porcentaje
       		  }}).success(function(response){alert(response);
         });
*/


    });

});

</script>

@endsection