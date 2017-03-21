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

<!-- INICIO agrega insumo a la stock y muestra los insumos cargados-->

{!! Form::open(['route' => ['admin.stockinsumos.mostrar', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-mostrarinsu' ]) !!}
{!! Form::close() !!}


<!-- INICIO agrega insumo a la stock y muestra los insumos cargados-->


<script>

//muestra el div con el nombre del insumo y brinda un campo para cargar la cantidad
function mostrarcantidad(btn_danger){

    var form = $('#form-mostrarinsu');
    var id_insumo = $(btn_danger).data('id');
    var url = form.attr('action').replace(':INSUMO_ID', id_insumo);
    var id_stock = $('.idstock').data('id');
    var token = form.serialize();
    data = {
      token: token,
      id_insumo: id_insumo,
      id_stock: id_stock,
    };
      $.get(url, data, function(stockinsumos){
        $('#cargarinsumo').hide();
        $('#cargarinsumo').show();
        $('#cargarinsumo').fadeOut().html(stockinsumos).fadeIn();

      });

};

</script>
