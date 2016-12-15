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
  <h4 id="nombre">Moño</h4>
{!! Form::number('cantidad',null,['class'=>'insumocantidad', 'id'=>'insumocantidad' , 'placeholder'=>'cantidad'])!!}
<button type="button" class="btn btn-danger" id="cargar">cargar</button>
</div>

<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->

{!! Form::open(['route' => ['admin.recetainsumos.show', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteadd' ]) !!}
{!! Form::close() !!}

<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->


<script>

//muestra el div con el nombre del insumo y brinda un campo para cargar la cantidad
function mostrarcantidad(btn_danger){
  console.log("llama a la funcion");
  var id_insumo = $(btn_danger).data('id');
  console.log(id_insumo);
  $('#cargarinsumo').show();
  var nombre = $(btn_danger).closest('tr').find('td.nombre'). html()
  console.log(nombre);
  $('#nombre').text(nombre);
//cargar insumo en la receta  
  $('#cargar' ).click(function() {
    var cantidad = $('.insumocantidad').val();
    console.log(id_insumo);
    console.log(nombre);
    console.log(cantidad);
  });

};

</script>
