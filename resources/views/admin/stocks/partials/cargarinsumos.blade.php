  <h4 id="nombreinsu">{{$insumo->nombre}}</h4>
{!! Form::select('tipo', ['1' => 'ingreso', '2' => 'egreso'], null, ['class'=> 'tipo'])!!}
{!! Form::number('cantidad',null,['class'=>'insumocantidad', 'id'=>'insumocantidad' , 'placeholder'=>'cantidad'])!!}
{!! Form::number('costo',null,['class'=>'insumocosto', 'id'=>'insumocosto' , 'placeholder'=>'costo'])!!}
{!! Form::hidden('nombre',$insumo->nombre,['class'=>'nombreins', 'id'=>'nombreins'])!!}
{!! Form::hidden('id_insumo',$insumo->id,['class'=>'id_insumo', 'id'=>'id_insumo'])!!}
{!! Form::hidden('id_stock',$stock->id,['class'=>'id_stock', 'id'=>'id_stock'])!!}
<button type="button" class="btn btn-danger" id="cargaring">cargar</button>
{!! Form::open(['route' => ['admin.stockinsumos.show', ':INGREDIENTE_ID'], 'method' => 'POST' , 'id' => 'form-insumoadd' ]) !!}
{!! Form::close() !!}

<script>

  $('#cargaring').click(function() {
    var id_insumo = $('#id_insumo').val();
    var cantidad = $('.insumocantidad').val();
    var costo = $('.insumocosto').val();
    var tipo = $('.tipo').val();
    var id_stock = $('#id_stock').val();
    var nombre = $('#nombreins').val();
        
    var form = $('#form-insumoadd');
    var url = form.attr('action').replace(':INGREDIENTE_ID', id_insumo);
    var token = form.serialize();
    console.log("cargar");
    console.log(id_insumo);
    console.log(cantidad);
    data = {
      token: token,
      id_insumo: id_insumo,
      cantidad: cantidad,
      costo: costo,
      tipo:tipo,
      id_stock: id_stock,
      nombre: nombre
    };
      $.get(url, data, function(stockinsumos){
        $('#cargarinsumo').hide();
        $('#insumosingredientes').show();
        $('#insumosingredientes').fadeOut().html(stockinsumos).fadeIn();

      });

  });


 </script>