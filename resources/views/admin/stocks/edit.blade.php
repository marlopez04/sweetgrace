@extends('admin.template.main')

@section('title', 'Nuevo Stock')

@section('content')

<!--
<div class="monthly-grid">
<div class="panel panel-widget">
-->
<div class="area">
	<div class="col-md-6 chrt-two area">
	<div class="panel-title">
			Nuevo Stock
			<h4 data-id="{{ $stock->id }}" class="idstock" hidden></h4>
	</div>
	<h4>Ingrediente / Insumo</h4>
       	{!! Form::select('type', ['1' => 'Ingrediente', '2' => 'Insumo'], null, ['class'=> 'tipo'])!!}

       	{!!	Form::text('nombre',null,['class'=>'item-nombre','id'=>'item-nombre' , 'placeholder'=>'Buscar'])!!}

       	<button type="button" class="btn btn-danger" id="buscar">Buscar</button>

       <div id="ingrediente" hidden></div>
       <div id="insumo" hidden></div>

<!-- INICIO carga los insumos e ingredientes que ya tiene cargada la stock-->

{!! Form::open(['route' => ['admin.stocks.show', ':STOCK_ID'], 'method' => 'POST' , 'id' => 'form-stock' ]) !!}
{!! Form::close() !!}

<!-- FIN carga los insumos e ingredientes que ya tiene cargada la stock-->


<!-- INICIO trae los insumos para poder agregarlos a la stock-->

{!! Form::open(['route' => ['admin.insumos.show', ':ARTICULO_ID'], 'method' => 'POST' , 'id' => 'form-insumoshow' ]) !!}
{!! Form::close() !!}

<!-- FIN trae los insumos para poder agregarlos a la stock-->

<!-- INICIO trae los ingredientes para poder agregarlos a la stock-->

{!! Form::open(['route' => ['admin.ingredientes.show', ':ARTICULO_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteshow' ]) !!}
{!! Form::close() !!}

<!-- FIN trae los ingredientes para poder agregarlos a la stock-->

</div>
<!--
</div>
<div class="clearfix"></div>

<div class="area">
	<div class="col-md-6 chrt-two area">
		<h3 class="sub-tittle">Ingredientes</h3>
		<div id="stockingredientes"></div>
	</div>
-->
	<div class="col-md-6 chrt-three">
		<h3 class="sub-tittle">Stock</h3>
		<a href="{{ route('admin.stocks.update') }}" class="btn btn-info">Confirmar Stock</a><hr>
		<div id="insumosingredientes"></div>
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

// carga los insumos e ingredientes de la stock

	  var form = $('#form-stock');
	  var id_stock = $('.idstock').data('id');
	  var url = form.attr('action').replace(':STOCK_ID', id_stock);
	  var token = form.serialize();
	  data = {
	    token: token
	  };
	  $.get(url, data, function(stock){
		      $('#insumosingredientes').show();
		      $('#insumosingredientes').fadeOut().html(stock).fadeIn();
	   });


// carga los insumos e ingredientes de la stock

//        $( ".tipo" ).change(function() {
//  			var seleccionado = $(this).val();
        	$('#buscar' ).click(function() {
        		var item = 0;
        	$('#insumo').hide();
        	$('#ingrediente').hide();

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
		          var tipo = 1;
		          data = {
		            token: token,
		            tipo: tipo
		          };
		          
		          $.get(url, data, function(ingrediente){

//		                $('#correctorscroll').hide();
//						$('#stockinsumo').hide();
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
		          var tipo = 1;
		          data = {
		            token: token,
		            tipo: tipo
		          };
		          
		          $.get(url, data, function(insumo){

//		                $('#correctorscroll').hide();
//						$('#stockingrediente').hide();
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

@endsection