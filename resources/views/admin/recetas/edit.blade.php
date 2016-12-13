@extends('admin.template.main')

@section('title', 'Agregar Receta del Articulo')

@section('content')

<div class="monthly-grid">
<div class="panel panel-widget">
	<div class="panel-title">
			Aregar Receta de {{ $receta->nombre }}
	</div>
	<h4>Ingrediente / Insumo</h4>
       	{!! Form::select('type', ['1' => 'Ingrediente', '2' => 'Insumo'], null, ['class'=> 'tipo'])!!}

       	{!!	Form::text('nombre',null,['class'=>'item-nombre','id'=>'item-nombre' , 'placeholder'=>'Buscar'])!!}

       	<button type="button" class="btn btn-danger" id="buscar">Buscar</button>

       <div id="recetaingrediente" hidden></div>
       <div id="recetainsumo" hidden></div>
       <div id="insumos"></div>
       <div id="ingredientes"></div>

<!-- INICIO con el id del cliente crea un nuevo pedido-->

{!! Form::open(['route' => ['admin.insumos.show', ':ARTICULO_ID'], 'method' => 'POST' , 'id' => 'form-insumoadd' ]) !!}
{!! Form::close() !!}

<!-- FIN con el id del cliente crea un nuevo pedido-->

<!-- INICIO trae los articulos de cada categoria-->

{!! Form::open(['route' => ['admin.ingredientes.show', ':ARTICULO_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteadd' ]) !!}
{!! Form::close() !!}

<!-- FIN trae los articulos de cada categoria-->

</div>
</div>

<div class="clearfix"></div>

<div id="correctorscroll">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
</div>


@endsection


@section('js')

<script type="text/javascript">

	$(document).ready(function () {

//        $( ".tipo" ).change(function() {
//  			var seleccionado = $(this).val();
        	$( '#buscar' ).click(function() {
        		var item = 0;
        	$('#recetainsumo').hide();
        	$('#recetaingrediente').hide();

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
		          var form = $('#form-ingredienteadd');
                  var url = form.attr('action').replace(':ARTICULO_ID', item);
		          var token = form.serialize();
		          data = {
		            token: token
		          };
		          
		          $.get(url, data, function(ingrediente){

//		                $('#correctorscroll').hide();
//						$('#recetainsumo').hide();
						$('#recetaingrediente').show();
		                $('#recetaingrediente').fadeOut().html(ingrediente).fadeIn();
//		                $("body").animate({ scrollTop: $(document).height()}, 500);
				   });


				} else{ 
//				if (seleccionado == 2) {

					// 2 insumo
		          var form = $('#form-insumoadd');
                  var url = form.attr('action').replace(':ARTICULO_ID', item);
		          var token = form.serialize();
		          data = {
		            token: token
		          };
		          
		          $.get(url, data, function(insumo){

//		                $('#correctorscroll').hide();
//						$('#recetaingrediente').hide();
						$('#recetainsumo').show();
		                $('#recetainsumo').fadeOut().html(insumo).fadeIn();
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

@endsection