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
	{!!	Form::hidden('id',$listaprecio->id,['class'=>'id_lista_actual'])!!}
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
	@if ($listaprecio->articulos->count() <> 0 )

		<div id='listaactual'>
			<td><button type="button" class="btn btn-danger" id="imprimir3">Imprimir</button></td>
		          <table class="table table-striped">
		              <thead>
		                <th>Articulo</th>
		                <th>Precio</th>
		                <th>Costo</th>
		                <th>Diferencia</th>
		              </thead>
		              <tbody>
		                @foreach($listaprecio->articulos as $articulo)
		                  <tr>
		                    <td>{{ $articulo->nombre }}</td>
		                    <td>{{ $articulo->precio }}</td>
		                    <td>{{ $articulo->receta->costo }}</td>
		                    <td>{{ $articulo->precio - $articulo->receta->costo }}</td>
		                  </tr>
		                @endforeach
		              </tbody>
		            </table>
		</div>

	@else
	
<div class="area" id="listaconf">
	<div class="panel panel-widget">
		<div id="listaconfirmada"></div>
	</div>

</div>
		<div id="carga">
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

</div>

<div class="clearfix"></div>

<!-- lista de precio actual fin -->

<div class="area" id="listasdecarga">
	<div class="col-md-6 chrt-two area">
		<h4>Lista de precio anterior</h4>
		<td><button type="button" class="btn btn-danger" id="imprimir1">Imprimir</button></td>
		<div id="listavieja"></div>
	</div>

	<div class="col-md-6 chrt-three">
		<h4>Lista Con aumento</h4>
		<td><button type="button" class="btn btn-danger" id="imprimir2">Imprimir</button></td>
		<div id="listanueva"></div>
	</div>


</div>

<div id="correctorscroll">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
</div>

</div>

@endif

{!! Form::open(['route' => ['admin.precios.imprimir', ':IMPRIMIR_ID'], 'method' => 'POST' , 'id' => 'form-imprimir' ]) !!}
{!! Form::close() !!}

<!-- INICIO muestra la lista de precio seleccionada -->

{!! Form::open(['route' => ['admin.precios.show', ':LISTA_ID'], 'method' => 'POST' , 'id' => 'form-lista' ]) !!}
{!! Form::close() !!}

<!-- FIN muestra la lista de precio seleccionada-->


<div class="clearfix"></div>



@endsection


@section('js')

<script type="text/javascript">

$(document).ready(function () {
	//cargo las listas de precios

	$('#cargar').click(function() {

	  var form = $('#form-lista');

	  var id_lista = $(".idlista").val();
	  var porcentaje = $('.porcentaje').val();
	  var id_lista_actual = $(".id_lista_actual").val();

	  var url = form.attr('action').replace(':LISTA_ID', id_lista);
//para imprimir form2 lista vieja, form3 lista nueva
	  var token = form.serialize();
	  console.log(id_lista_actual);
	  console.log(porcentaje);
	  console.log(id_lista);
	  var tipo = 1;
//recupero lista vieja
	  data = {
	    token: token,
	    lista_id: id_lista_actual,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };
	  $.get(url, data, function(listavieja){
		      $('#listavieja').show().fadeOut().html(listavieja).fadeIn();
	   });
	  console.log(listavieja);
//recupero lista vieja con el porcentaje de aumento
	  tipo = 2;
 	  data = {
	    token: token,
	    lista_id: id_lista_actual,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };
	  $.get(url, data, function(listanueva){
		      $('#listanueva').show().fadeOut().html(listanueva).fadeIn();
	   });
	  	console.log(listanueva);

	});

	$('#imprimir1').click(function() {
	  var id_lista = $(".idlista").val();
//	  var id_lista = $('.idlista').data('id');
	  var porcentaje = $('.porcentaje').val();
	  var tipo = 1;
//recupero lista vieja

	  var form = $('#form-imprimir');
	  var token = form.serialize();

   var url = form.attr('action').replace(':IMPRIMIR_ID', id_lista);

 	  var form_data = {
	    token: token,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };

       $.get(url, form_data, function(res){
       		window.open(res,'_blank');
       });

    });

    $('#imprimir2').click(function() {
	  var id_lista = $(".idlista").val();
//	  var id_lista = $('.idlista').data('id');
	  var porcentaje = $('.porcentaje').val();
	  var tipo = 2;
//recupero lista vieja

	  var form = $('#form-imprimir');
	  var token = form.serialize();

   var url = form.attr('action').replace(':IMPRIMIR_ID', id_lista);

 	  var form_data = {
	    token: token,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };

       $.get(url, form_data, function(res){
       		window.open(res,'_blank');
       });

    });


    $('#imprimir3').click(function() {
      var id_lista_actual = $(".id_lista_actual").val();
//	  var id_lista = $(".idlista").val();
//	  var id_lista = $('.idlista').data('id');
	  var porcentaje = 0;
	  var tipo = 1;
//recupero lista vieja

	  var form = $('#form-imprimir');
	  var token = form.serialize();

      var url = form.attr('action').replace(':IMPRIMIR_ID', id_lista_actual);

 	  var form_data = {
	    token: token,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };

       $.get(url, form_data, function(res){
       		window.open(res,'_blank');
       });

    });


    $('#confirmar').click(function() {
	  var form = $('#form-lista');
	  var id_lista_actual = $(".id_lista_actual").val();
	  var id_lista = $(".idlista").val();
	  var porcentaje = $('.porcentaje').val();

	  var url = form.attr('action').replace(':LISTA_ID', id_lista);
//para imprimir form2 lista vieja, form3 lista nueva
	  var token = form.serialize();
	  console.log(porcentaje);
	  console.log(id_lista_actual);
	  console.log(id_lista);
	  var tipo = 3;
//recupero lista vieja
	  data = {
	    token: token,
	    lista_id: id_lista_actual,
	    porcentaje: porcentaje,
	    tipo: tipo
	  };
	  $.get(url, data, function(listaconfirmada){
		      $('#carga').hide();
		      $('#listasdecarga').hide();		      
		      $('#listaconfirmada').show().fadeOut().html(listaconfirmada).fadeIn();

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