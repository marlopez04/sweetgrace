<!-- INGREDIENTES       -->
                 <h4>Ingredientes</h4>
          <table class="table table-striped">
              <thead>
                <th></th>
                <th>Ingrediente</th>
                <th>Cantidad</th>
              </thead>
              <tbody>
                @foreach($receta->recetaingredientes as $recetaingrediente)
                  <tr>
                    <td>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick='borraringrdiente(this)' data-id="{{ $recetaingrediente->id}}"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    </td>
                    <td>{{ $recetaingrediente->nombre }}</td>
                    <td>{{ $recetaingrediente->cantidad }}</td>
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
                @foreach($receta->recetainsumos as $recetainsumo)
                  <tr>
                    <td>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick='borrarinsumo(this)' data-id="{{ $recetainsumo->id}}"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    </td>
                    <td>{{ $recetainsumo->nombre }}</td>
                    <td>{{ $recetainsumo->cantidad }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="clearfix"></div>                

<!-- INICIO borra el ingrediente seleccionado de la receta-->

{!! Form::open(['route' => ['admin.recetaingredientes.destroy', ':INGREDIENTE_ID'], 'method' => 'POST' , 'id' => 'form-deleteingrediente' ]) !!}
{!! Form::close() !!}


<!-- FIN borra el ingrediente seleccionado de la receta-->

<!-- INICIO borra el insumo seleccionado de la receta-->

{!! Form::open(['route' => ['admin.recetainsumos.destroy', ':INSUMO_ID'], 'method' => 'POST' , 'id' => 'form-deleteinsumo' ]) !!}
{!! Form::close() !!}


<!-- FIN borra el insumo seleccionado de la receta-->

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
    $.get(url, data, function(recetainsumos){

      $('#insumosingredientes').show();
      $('#insumosingredientes').fadeOut().html(recetainsumos).fadeIn();

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
    $.get(url, data, function(recetainsumos){

      $('#insumosingredientes').show();
      $('#insumosingredientes').fadeOut().html(recetainsumos).fadeIn();

    });
  };



</script>