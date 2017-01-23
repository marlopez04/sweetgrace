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
  <h4 id="nombre">Moño</h4>
{!! Form::number('cantidad',null,['class'=>'insumocantidad', 'id'=>'insumocantidad' , 'placeholder'=>'cantidad'])!!}
<button type="button" class="btn btn-danger" id="cargarins">cargar</button>
</div>

<!-- INICIO agrega ingrediente a la stock y muestra los ingredientes cargados-->

{!! Form::open(['route' => ['admin.stockinsumos.show', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-insumoadd' ]) !!}
{!! Form::close() !!}

<!-- INICIO agrega ingrediente a la stock y muestra los ingredientes cargados-->


<script>

//muestra el div con el nombre del insumo y brinda un campo para cargar la cantidad
function mostrarcantidad(btn_danger){
  console.log("llama a la funcion");
  var id_insumo = 0;
  id_insumo = $(btn_danger).data('id');
  console.log(id_insumo);
  $('#cargarinsumo').show();
  var nombre = $(btn_danger).closest('tr').find('td.nombre').html()
  console.log(nombre);
  $('#nombre').text(nombre);
//cargar insumo en la stock  
  $('#cargarins' ).click(function() {
    var cantidad = $('.insumocantidad').val();
    var id_stock = $('.idstock').data('id');
    console.log(id_insumo);
    console.log(nombre);
    console.log(cantidad);
    console.log(id_stock);
        
    var form = $('#form-insumoadd');
    var url = form.attr('action').replace(':INSUMO_ID', id_insumo);
    var token = form.serialize();
    data = {
      token: token,
      id_insumo: id_insumo,
      cantidad: cantidad,
      id_stock: id_stock,
      nombre: nombre
    };
    if (id_insumo != 0) {
      $.get(url, data, function(stockinsumos){
        $('#cargarinsumo').hide();
        $('#insumosingredientes').show();
        $('#insumosingredientes').fadeOut().html(stockinsumos).fadeIn();
        id_insumo = 0;

      });

    };

  });

};

</script>
