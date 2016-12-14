	<table class="table table-striped">
              <thead>
                <th>Insumo</th>
                <th>Stock</th>
                <th>Seleccionar</th>
              </thead>
              <tbody>
                @foreach($insumos as $insumo)
                  <tr>
                    <td>{{ $insumo->nombre }}</td>
                    <td>{{ $insumo->cantidad }}</td>
                    <td>
                      <button type="button" class="btn btn-danger" id="agregarinsumo">agregar</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
    </table>

<div id="cargar">
{!! Form::text('nombre',null,['class'=>'item-nombre','id'=>'item-nombre' , 'placeholder'=>'cantidad'])!!}
<button type="button" class="btn btn-danger" id="agregaringrediente">cargar</button>
</div>

<!-- INICIO agrega insumo a la receta y muestra los insumo cargados-->

{!! Form::open(['route' => ['admin.recetainsumos.show', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-insumoadd' ]) !!}
{!! Form::close() !!}

<!-- INICIO agrega insumo a la receta y muestra los insumo cargados-->


@section('js')

<script type="text/javascript">

  $(document).ready(function () {

// dom ready
  });

</script>

@endsection