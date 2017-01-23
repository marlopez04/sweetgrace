	<table class="table table-striped">
              <thead>
                <th>Ingrediente</th>
                <th>Stock</th>
                <th>Seleccionar</th>
              </thead>
              <tbody>
                @foreach($ingredientes as $ingrediente)
                  <tr>
                    <td class="nombre">{{ $ingrediente->nombre }}</td>
                    <td>{{ $ingrediente->cantidad }}</td>
                    <td>
                      <a href="javascript:void(0)" class="btn btn-danger" onclick='mostrarcantidad(this)' data-id="{{ $ingrediente->id}}">Agregar
                    </td>
                  </tr>
                @endforeach
              </tbody>
    </table>
<div class="text-center">
  {!! $ingredientes->render()!!}
</div>

<div id="cargaringrediente" hidden>
  <h4 id="nombre">Moño</h4>
{!! Form::number('cantidad',null,['class'=>'ingredientecantidad', 'id'=>'ingredientecantidad' , 'placeholder'=>'cantidad'])!!}
<button type="button" class="btn btn-danger" id="cargaring">cargar</button>
</div>
<!-- INICIO agrega ingrediente a la stock y muestra los ingredientes cargados-->

{!! Form::open(['route' => ['admin.stockingredientes.show', ':INGREDIENTE_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteadd' ]) !!}
{!! Form::close() !!}

<!-- INICIO agrega ingrediente a la stock y muestra los ingredientes cargados-->


<script>

//muestra el div con el nombre del insumo y brinda un campo para cargar la cantidad
function mostrarcantidad(btn_danger){
  console.log("llama a la funcion");
  var id_ingrediente = $(btn_danger).data('id');
  console.log(id_ingrediente);
  $('#cargaringrediente').show();
  var nombre = $(btn_danger).closest('tr').find('td.nombre').html()
  console.log(nombre);
  $('#nombre').text(nombre);
//cargar insumo en la stock  
  $('#cargaring' ).click(function() {
    var cantidad = $('.ingredientecantidad').val();
    var id_stock = $('.idstock').data('id');
    console.log(id_ingrediente);
    console.log(nombre);
    console.log(cantidad);
    console.log(id_stock);
        
    var form = $('#form-ingredienteadd');
    var url = form.attr('action').replace(':INGREDIENTE_ID', id_ingrediente);
    var token = form.serialize();
    data = {
      token: token,
      id_ingrediente: id_ingrediente,
      cantidad: cantidad,
      id_stock: id_stock,
      nombre: nombre
    };
    if (id_ingrediente != 0) {
      $.get(url, data, function(stock){
        $('#cargaringrediente').hide();
        $('#insumosingredientes').show();
        $('#insumosingredientes').fadeOut().html(stock).fadeIn();
  //      $('#insumosingredientes').html(stock);
        id_ingrediente = 0;

      });

    };

  });

};

</script>
