@extends('admin.template.main')

@section('title', 'Agregar Un Insumo'. $listaprecio->nombre)

@section('content')

<!-- lista de precio actual inicio -->

<div class="women_main">
<div class="w_content">
<div class="panel panel-widget">
	<div class="panel-title">
			Editar {{ $listaprecio->nombre }}
			<h4 data-id="{{ $listaprecio->id }}" class="idlista" hidden></h4>
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
			<td>{!! Form::select('lista_id', $listasprecios, null, ['class' => 'form-control select-category', 'required']) !!}</td>
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

       <div id="listavieja" hidden></div>

<!-- INICIO muestra la lista de precio seleccionada -->

{!! Form::open(['route' => ['admin.precios.show', ':LISTA_ID'], 'method' => 'POST' , 'id' => 'form-lista' ]) !!}
{!! Form::close() !!}

<!-- FIN muestra la lista de precio seleccionada-->

	</div>

	<div class="col-md-6 chrt-three">
		<h4>Lista Con aumento</h4>
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

// carga los insumos e ingredientes de la receta

	  var form = $('#form-lista');
	  var id_receta = $('.idlista').data('id');
	  var url = form.attr('action').replace(':LISTA_ID', id_receta);
	  var token = form.serialize();
	  data = {
	    token: token
	  };
	  $.get(url, data, function(receta){
		      $('#insumosingredientes').show();
		      $('#insumosingredientes').fadeOut().html(receta).fadeIn();
	   });


// carga los insumos e ingredientes de la receta

//        $( ".tipo" ).change(function() {
//  			var seleccionado = $(this).val();
        	$('#cargar' ).click(function() {
        		var item = 0;
        	$('#listavieja').hide();
        	$('#listanueva').hide();

//        	if ($(".item").value == null || $(".item").value.length == 0)
//        	if ($(".item").text.length <> 0){ 

//			var item = $(".item-nombre").val();
			 console.log(item);

//        	if ($(".item-nombre").empty() ) {
			if($('#item-nombre').val().trim()){ 
//        		item = "0";
//        		console.log("vacio");
//        	}else{
        		console.log("contenido");
        		item = $('#item-nombre').val();	
        	}
  			
  			var seleccionado = $(".tipo").val();
  			console.log(item);
  			console.log(seleccionado);
  				// 1 ingrediente
  				// 2 insumo

  				if (seleccionado == 1) {

				    // 1 ingrediente
		          var form = $('#form-ingredienteshow');
                  var url = form.attr('action').replace(':ARTICULO_ID', item);
		          var token = form.serialize();
		          var tipo = 0;
		          data = {
		            token: token,
		            tipo: tipo
		          };
		          
		          $.get(url, data, function(ingrediente){

//		                $('#correctorscroll').hide();
//						$('#recetainsumo').hide();
						$('#ingrediente').show();
		                $('#ingrediente').fadeOut().html(ingrediente).fadeIn();
//		                $("body").animate({ scrollTop: $(document).height()}, 500);
				   });


				} else{ 
//				if (seleccionado == 2) {

					// 2 insumo
		          var form = $('#form-insumoshow');
                  var url = form.attr('action').replace(':ARTICULO_ID', item);
		          var token = form.serialize();
		          var tipo = 0;
		          data = {
		            token: token,
		            tipo: tipo
		          };
		          
		          $.get(url, data, function(insumo){

//		                $('#correctorscroll').hide();
//						$('#recetaingrediente').hide();
						$('#insumo').show();
		                $('#insumo').fadeOut().html(insumo).fadeIn();
//		                $("body").animate({ scrollTop: $(document).height()}, 500);
				   });
				    
				}

//boton buscar  				
			});

//cambio en la seleccion
//		});

// dom ready           
	});

</script>

