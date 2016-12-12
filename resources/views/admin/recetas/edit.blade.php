@extends('admin.template.main')

@section('title', 'Agregar Receta del Articulo')

@section('content')

<div class="monthly-grid">
<div class="panel panel-widget">
	<div class="panel-title">
			Aregar Receta de {{ $receta->nombre }}
	</div>
	<h4>Ingrediente / Insumo</h4>
       	{!! Form::select('type', ['1' => 'Ingrediente', '2' => 'Insumo'], null, ['class'=> 'tipo', 'placeholder' => 'Seleccione una opción...', 'required'])!!}

       <div id="recetaitem"></div>
       <div id="insumos"></div>
       <div id="ingredientes"></div>

<!-- INICIO con el id del cliente crea un nuevo pedido-->

{!! Form::open(['route' => ['admin.insumos.show', ':CLIENTE_ID'], 'method' => 'POST' , 'id' => 'form-insumoadd' ]) !!}
{!! Form::close() !!}

<!-- FIN con el id del cliente crea un nuevo pedido-->

<!-- INICIO trae los articulos de cada categoria-->

{!! Form::open(['route' => ['admin.ingredientes.show', ':CATEGORIA_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteadd' ]) !!}
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

        	$( ".tipo" ).change(function() {
  				var seleccionado = $(this).val();
  				// 1 ingrediente
  				// 2 insumo


  				if (seleccionado = 1) {

				    // 1 ingrediente
		          var form = $('#form-ingredienteadd');
                  var url = form.attr('action').replace(':CLIENTE_ID', seleccionado);
		          var token = form.serialize();
		          data = {
		            token: token
		          };
		          console.log(data);
		          $.get(url, data, function(ingrediente){

//		                $('#correctorscroll').hide();
		                $('#recetaitem').fadeOut().html(ingrediente).fadeIn();
//		                $("body").animate({ scrollTop: $(document).height()}, 500);
				   });


				} else {

					// 2 insumo
		          var form = $('#form-insumoadd');
                  var url = form.attr('action').replace(':CLIENTE_ID', seleccionado);
		          var token = form.serialize();
		          data = {
		            token: token
		          };
		          console.log(data);
		          $.get(url, data, function(insumo){

		                $('#correctorscroll').hide();
		                $('#recetaitem').fadeOut().html(insumo).fadeIn();
//		                $("body").animate({ scrollTop: $(document).height()}, 500);
				   });
				    
				}

  				$('#recetaitem').text(seleccionado);
			});

           
        });

    </script>

@endsection