  <h4 id="nombreinsu">{{$insumo->nombre}}</h4>
{!! Form::number('cantidad',null,['class'=>'insumocantidad', 'id'=>'insumocantidad' , 'placeholder'=>'cantidad'])!!}
{!! Form::hidden('nombre',$insumo->nombre,['class'=>'nombre', 'id'=>'nombre'])!!}
{!! Form::hidden('id_insumo',$insumo->id,['class'=>'id_insumo', 'id'=>'id_insumo'])!!}
{!! Form::hidden('id_receta',$receta->id,['class'=>'id_receta', 'id'=>'id_receta'])!!}
<button type="button" class="btn btn-danger" id="cargarins">cargar</button>
{!! Form::open(['route' => ['admin.recetainsumos.show', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-insumoadd' ]) !!}
{!! Form::close() !!}

<script>

  $('#cargarins' ).click(function() {
    var cantidad = $('.insumocantidad').val();
    var id_insumo = $('#id_insumo').val();
    var id_receta = $('#id_receta').val();
    var nombre = $('#nombre').val();
        
    var form = $('#form-insumoadd');
    var url = form.attr('action').replace(':INSUMO_ID', id_insumo);
    var token = form.serialize();
    data = {
      token: token,
      id_insumo: id_insumo,
      cantidad: cantidad,
      id_receta: id_receta,
      nombre: nombre
    };
      $.get(url, data, function(recetainsumos){
        $('#cargarinsumo').hide();
        $('#insumosingredientes').show();
        $('#insumosingredientes').fadeOut().html(recetainsumos).fadeIn();
        id_insumo = 0;

      });

  });


 </script>