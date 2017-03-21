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

<div id="cargarinsumo" hidden>

</div>

<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->

{!! Form::open(['route' => ['admin.recetainsumos.mostrar', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-mostrarins' ]) !!}
{!! Form::close() !!}


<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->


<script>

//muestra el div con el nombre del insumo y brinda un campo para cargar la cantidad
function mostrarcantidad(btn_danger){

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
      $.get(url, data, function(recetainsumos){
        $('#cargarinsumo').hide();
        $('#cargarinsumo').show();
        $('#cargarinsumo').fadeOut().html(recetainsumos).fadeIn();
        id_insumo = 0;

      });

};

</script>
