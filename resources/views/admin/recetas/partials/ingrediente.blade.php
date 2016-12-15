	<table class="table table-striped">
              <thead>
                <th>Ingrediente</th>
                <th>Stock</th>
                <th>Seleccionar</th>
              </thead>
              <tbody>
                @foreach($ingredientes as $ingrediente)
                  <tr>
                    <td>{{ $ingrediente->nombre }}</td>
                    <td>{{ $ingrediente->cantidad }}</td>
                    <td>
                      <button type="button" class="btn-danger"  onclick="mostrarcantidad(this)" id="{{ $ingrediente->id}}">agregar</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
    </table>

<div id="cargaringrediente">
  <h5>Harina</h5>
  {!! Form::text('nombre',null,['class'=>'item-nombre','id'=>'item-nombre' , 'placeholder'=>'cantidad'])!!}
<button type="button" class="btn btn-danger" id="agregaringrediente">cargar</button>
</div>
<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->

{!! Form::open(['route' => ['admin.recetaingredientes.show', ':INGREDIENTE_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteadd' ]) !!}
{!! Form::close() !!}

<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->


@section('js')

<script>

function mostrarcantidad(btn_danger){
    console.log("");
    $('#cargaringrediente').show;
    var id_item = $(btn_danger).data('id');
    console.log(id_item);

};


</script>

@endsection