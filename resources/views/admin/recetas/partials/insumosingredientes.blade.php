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
                    <a href="javascript:void(0)" class="btn-danger" onclick='borraritem(this)' data-id="{{ $recetainsumo->id}}"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    </td>
                    <td>{{ $recetaingrediente->nombre }}</td>
                    <td>{{ $recetaingrediente->cantidad }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

<!-- INSUMOS       -->
                 <h4>insumos</h4>
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
                    <a href="javascript:void(0)" class="btn-danger" onclick='borraritem(this)' data-id="{{ $recetainsumo->id}}"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    </td>
                    <td>{{ $recetainsumo->nombre }}</td>
                    <td>{{ $recetainsumo->cantidad }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="clearfix"></div>                

<script>

function borraritem(btn_danger){
  console.log("llama a la funcion");
  var id_item = $(btn_danger).data('id');
  console.log(id_item);
    var form = $('#form-deleteitem');
    var url = form.attr('action').replace(':ITEM_ID', id_item);
    var token = form.serialize();
    data = {
      token: token,
      id_item: id_item
    };
    console.log(data);
    $.get(url, data, function(items){

            $('#itemcontent').hide();                                          

           $('#items').fadeOut().html(items).fadeIn();

           $('#itemcontent').show();

           $("body").animate({ scrollTop: $(document).height()});

           });
  };



</script>