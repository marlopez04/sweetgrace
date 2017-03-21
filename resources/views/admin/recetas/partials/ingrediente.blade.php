<table class="table table-striped">
            <thead>
              <th>Insumo</th>
              <th>Stock</th>
              <th>Seleccionar</th>
            </thead>
            <tbody>
              @foreach($ingredientes as $ingrediente)
                <tr>
                  <td class="nombre">{{ $ingrediente->nombre }}</td>
                  <td>{{ $ingrediente->cantidad }}</td>
                  <td>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick='mostrarcantidad(this)' data-id="{{ $ingrediente->id}}">Agregar</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
</table>

<div id="cargaringrediente" hidden>

</div>

<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->

{!! Form::open(['route' => ['admin.recetaingredientes.mostrar', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-mostrarins' ]) !!}
{!! Form::close() !!}


<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->


<script>

//muestra el div con el nombre del ingrediente y brinda un campo para cargar la cantidad
function mostrarcantidad(btn_danger){

    var form = $('#form-mostrarins');
    var id_ingrediente = $(btn_danger).data('id');
    var url = form.attr('action').replace(':INSUMO_ID', id_ingrediente);
    var id_receta = $('.idreceta').data('id');
    var token = form.serialize();
    data = {
      token: token,
      id_ingrediente: id_ingrediente,
      id_receta: id_receta,
    };
      $.get(url, data, function(recetaingredientes){
        $('#cargaringrediente').hide();
        $('#cargaringrediente').show();
        $('#cargaringrediente').fadeOut().html(recetaingredientes).fadeIn();
        id_ingrediente = 0;

      });

};

</script>
