  <h4 id="nombreinsu">{{$ingrediente->nombre}}</h4>
{!! Form::select('tipo', ['1' => 'ingreso', '2' => 'egreso'], null, ['class'=> 'tipo'])!!}
{!! Form::number('cantidad',null,['class'=>'ingredientecantidad', 'id'=>'ingredientecantidad' , 'placeholder'=>'cantidad'])!!}
{!! Form::number('costo',null,['class'=>'ingredientecosto', 'id'=>'ingredientecosto' , 'placeholder'=>'costo'])!!}
{!! Form::hidden('nombre',$ingrediente->nombre,['class'=>'nombre', 'id'=>'nombre'])!!}
{!! Form::hidden('id_ingrediente',$ingrediente->id,['class'=>'id_ingrediente', 'id'=>'id_ingrediente'])!!}
{!! Form::hidden('id_stock',$stock->id,['class'=>'id_stock', 'id'=>'id_stock'])!!}
<button type="button" class="btn btn-danger" id="cargarins">cargar</button>
{!! Form::open(['route' => ['admin.stockingredientes.show', ':INGREDIENTE_ID'], 'method' => 'POST' , 'id' => 'form-ingredienteadd' ]) !!}
{!! Form::close() !!}

<script>

  $('#cargarins').click(function() {
    var id_ingrediente = $('#id_ingrediente').val();
    var cantidad = $('.ingredientecantidad').val();
    var costo = $('.ingredientecosto').val();
    var tipo = $('.tipo').val();
    var id_stock = $('#id_stock').val();
    var nombre = $('#nombre').val();
        
    var form = $('#form-ingredienteadd');
    var url = form.attr('action').replace(':INGREDIENTE_ID', id_ingrediente);
    var token = form.serialize();
    data = {
      token: token,
      id_ingrediente: id_ingrediente,
      cantidad: cantidad,
      costo: costo,
      tipo:tipo,
      id_stock: id_stock,
      nombre: nombre
    };
      $.get(url, data, function(stockingredientes){
        $('#cargaringrediente').hide();
        $('#insumosingredientes').show();
        $('#insumosingredientes').fadeOut().html(stockingredientes).fadeIn();

      });

  });


 </script>