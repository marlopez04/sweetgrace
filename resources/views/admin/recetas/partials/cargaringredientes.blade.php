  <h4 id="nombreinsu">{{$ingrediente->nombre}}</h4>
{!! Form::number('cantidad',null,['class'=>'ingredientecantidad', 'id'=>'ingredientecantidad' , 'placeholder'=>'cantidad'])!!}
{!! Form::hidden('nombre',$ingrediente->nombre,['class'=>'nombre', 'id'=>'nombre'])!!}
{!! Form::hidden('id_ingrediente',$ingrediente->id,['class'=>'id_ingrediente', 'id'=>'id_ingrediente'])!!}
{!! Form::hidden('id_receta',$receta->id,['class'=>'id_receta', 'id'=>'id_receta'])!!}
<button type="button" class="btn btn-danger" id="cargarins">cargar</button>
{!! Form::open(['route' => ['admin.recetaingredientes.show', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteadd' ]) !!}
{!! Form::close() !!}

<script>

  $('#cargarins' ).click(function() {
    var cantidad = $('.ingredientecantidad').val();
    var id_ingrediente = $('#id_ingrediente').val();
    var id_receta = $('#id_receta').val();
    var nombre = $('#nombre').val();
        
    var form = $('#form-ingredienteadd');
    var url = form.attr('action').replace(':INSUMO_ID', id_ingrediente);
    var token = form.serialize();
    data = {
      token: token,
      id_ingrediente: id_ingrediente,
      cantidad: cantidad,
      id_receta: id_receta,
      nombre: nombre
    };
      $.get(url, data, function(recetaingredientes){
        $('#cargaringrediente').hide();
        $('#insumosingredientes').show();
        $('#insumosingredientes').fadeOut().html(recetaingredientes).fadeIn();
        id_ingrediente = 0;

      });

  });


 </script>