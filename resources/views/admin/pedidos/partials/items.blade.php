<div >
          <table class="table table-striped" align="center">
              <thead>
                <th>Articulo</th>
                <th></th>
                <th>Importe</th>
              </thead>
              <tbody>
                @foreach($pedido->pedidoarticulos as $pedidoarticulo)
                  <tr>
                    <td>
                    <a href="javascript:void(0)" class='btn_danger' onclick='borraritem(this)' data-id="{{ $pedidoarticulo->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    {{ $pedidoarticulo->descripcion}}
                    </td>
                    <td>{{ $pedidoarticulo->cantidad }}</td>
                    <td>$ {{ $pedidoarticulo->precio }}</td>
                  </tr>
                @endforeach
                <tr>
                    <td>TOTAL</td>
                    <td></td>
                    <td align="rigth">${{ $pedido->pedidoarticulos->sum('precio') }}</td>
                  </tr>
              </tbody>
            </table>
                 <div class="clearfix"></div>
             </div>
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

           });
  };



</script>