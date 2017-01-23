<!-- INGREDIENTES       -->
                 <h4>Ingredientes</h4>
          <table class="table table-striped">
              <thead>
                <th></th>
                <th>Ingrediente</th>
                <th>Cantidad</th>
              </thead>
              <tbody>
                @foreach($stock->stockingredientes as $stockingrediente)
                  <tr>
                    <td>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick='borraringrdiente(this)' data-id="{{ $stockingrediente->id}}"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    </td>
                    <td>{{ $stockingrediente->nombre }}</td>
                    <td>{{ $stockingrediente->cantidad }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

<!-- INSUMOS       -->
                 <h4>Insumos</h4>
          <table class="table table-striped">
              <thead>
                <th></th>
                <th>Insumo</th>
                <th>Cantidad</th>
              </thead>
              <tbody>
                @foreach($stock->stockinsumos as $stockinsumo)
                  <tr>
                    <td>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick='borrarinsumo(this)' data-id="{{ $stockinsumo->id}}"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    </td>
                    <td>{{ $stockinsumo->nombre }}</td>
                    <td>{{ $stockinsumo->cantidad }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="clearfix"></div>                

<!-- INICIO borra el ingrediente seleccionado de la stock-->

{!! Form::open(['route' => ['admin.stockingredientes.destroy', ':INGREDIENTE_ID'], 'method' => 'POST' , 'id' => 'form-deleteingrediente' ]) !!}
{!! Form::close() !!}


<!-- FIN borra el ingrediente seleccionado de la stock-->

<!-- INICIO borra el insumo seleccionado de la stock-->

{!! Form::open(['route' => ['admin.stockinsumos.destroy', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-deleteinsumo' ]) !!}
{!! Form::close() !!}


<!-- FIN borra el insumo seleccionado de la stock-->

<script>

function borraringrdiente(btn_danger){
  console.log("borrar ingrediente");
  var id_ingredientedel = $(btn_danger).data('id');
  console.log(id_ingredientedel);
    var form = $('#form-deleteingrediente');
    var url = form.attr('action').replace(':INGREDIENTE_ID', id_ingredientedel);
    var token = form.serialize();
    data = {
      token: token,
      id_ingrediente: id_ingredientedel
    };
    $.get(url, data, function(stockinsumos){

      $('#insumosingredientes').show();
      $('#insumosingredientes').fadeOut().html(stockinsumos).fadeIn();

    });
  };

function borrarinsumo(btn_danger){
  console.log("llama a la funcion");
  var id_insumodel = $(btn_danger).data('id');
  console.log(id_insumodel);
    var form = $('#form-deleteinsumo');
    var url = form.attr('action').replace(':INSUMO_ID', id_insumodel);
    var token = form.serialize();
    data = {
      token: token,
      id_insumo: id_insumodel
    };
    $.get(url, data, function(stockinsumos){

      $('#insumosingredientes').show();
      $('#insumosingredientes').fadeOut().html(stockinsumos).fadeIn();

    });
  };



</script>