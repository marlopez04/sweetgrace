<table class="table table-striped">
            <thead>
              <th>Insumo</th>
              <th>Stock</th>
              <th>Seleccionar</th>
            </thead>
            <tbody>
              @foreach($insumos as $insumo)
                <tr>
                  <td class="nombre">{{ $insumo->nombre }}</td>
                  <td>{{ $insumo->cantidad }}</td>
                  <td>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick='mostrarcantidad(this)' data-id="{{ $insumo->id}}">Agregar</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
</table>
<div class="text-center">
  {!! $insumos->render()!!}
</div>

<div id="cargarinsumo" hidden>
<!--
  <h4 id="nombreinsu"></h4>
{!! Form::number('cantidad',null,['class'=>'insumocantidad', 'id'=>'insumocantidad' , 'placeholder'=>'cantidad'])!!}
{!! Form::number('id_insumo',null,['class'=>'id_insumo', 'id'=>'id_insumo'])!!}
<button type="button" class="btn btn-danger" id="cargarins">cargar</button>
{!! Form::open(['route' => ['admin.recetainsumos.show', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-insumoadd' ]) !!}
{!! Form::close() !!}
-->
</div>

<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->

{!! Form::open(['route' => ['admin.recetainsumos.mostrar', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-mostrarins' ]) !!}
{!! Form::close() !!}


<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->


<script>

//muestra el div con el nombre del insumo y brinda un campo para cargar la cantidad
function mostrarcantidad(btn_danger){
/*
  console.log("llama a la funcion");
  $('#id_insumo').val("");
  $('#id_insumo').val($(btn_danger).data('id'));
  $('.insumocantidad').val("");
  $('#cargarinsumo').show();
  var cantidadant = 0;
  var nombre = $(btn_danger).closest('tr').find('td.nombre').html()
  console.log(nombre);
  $('#nombreinsu').text(nombre);
*/

    var form = $('#form-mostrarins');
    var id_insumo = $(btn_danger).data('id');
    var url = form.attr('action').replace(':INSUMO_ID', id_insumo);
    var id_receta = $('.idreceta').data('id');
    var token = form.serialize();
    data = {
      token: token,
      id_insumo: id_insumo,
      id_receta: id_receta,
    };
//    if (id_insumo != 0) {
      $.get(url, data, function(recetainsumos){
        $('#cargarinsumo').hide();
        $('#insumosingredientes').show();
        $('#insumosingredientes').fadeOut().html(recetainsumos).fadeIn();
        id_insumo = 0;

        cantidadant = cantidad;


      });

//cargar insumo en la receta  
/*
  $('#cargarins' ).click(function() {
    var cantidad = $('.insumocantidad').val();
  if (cantidad != cantidadant ) {
    var id_insumo = $('#id_insumo').val();
    var id_receta = $('.idreceta').data('id');
    console.log("insumo id");
    console.log(id_insumo);
    console.log(nombre);
    console.log("cantidad");
    console.log(cantidad);
    console.log("id_receta");
    console.log(id_receta);
        
    var form = $('#form-insumoadd');
    var url = form.attr('action').replace(':INSUMO_ID', id_insumo);
    var token = form.serialize();
    data = {
      token: token,
      id_insumo: id_insumo,
      cantidad: cantidad,
      id_receta: id_receta,
      nombre: nombre
    };
    if (id_insumo != 0) {
      $.get(url, data, function(recetainsumos){
        $('#cargarinsumo').hide();
        $('#insumosingredientes').show();
        $('#insumosingredientes').fadeOut().html(recetainsumos).fadeIn();
        id_insumo = 0;

        cantidadant = cantidad;


      });

    };

  };

  });

*/

};

</script>
