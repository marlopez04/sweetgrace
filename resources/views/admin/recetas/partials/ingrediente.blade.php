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
</div>
<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->

{!! Form::open(['route' => ['admin.recetaingredientes.show', ':INGREDIENTE_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteadd' ]) !!}
{!! Form::close() !!}

<!-- INICIO agrega ingrediente a la receta y muestra los ingredientes cargados-->


@section('js')

<script type="text/javascript">

function mostrarcantidad(btn_danger){
    console.log("");
    var id_item = $(btn_danger).data('id');
    console.log(id_item);
//   $('.btn-danger').on('click', function(){
      var form = $('#form-deleteitem');
      var url = form.attr('action').replace(':ITEM_ID', id_item);
      var token = form.serialize();
      data = {
        token: token,
        id_item: id_item
      };
      console.log(data);
      $.get(url, data, function(recetaingr){
                                    
             $('#cargaringrediente').fadeOut().html(recetaingr).fadeIn();

             });

};


</script>

@endsection