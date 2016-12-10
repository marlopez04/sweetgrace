<div class="price-details">
                 <h3>Articulos</h3>
          <table class="table table-striped">
              <thead>
                <th></th>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Importe</th>
              </thead>
              <tbody>
                @foreach($pedido->pedidoarticulos as $pedidoarticulo)
                  <tr>
                    <td>
                    <a href="javascript:void(0)" class="btn-danger" onclick='borraritem(this)' data-id="{{ $pedidoarticulo->id}}"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    </td>
                    <td>{{ $pedidoarticulo->descripcion}}</td>
                    <td>{{ $pedidoarticulo->cantidad }}</td>
                    <td>$ {{ $pedidoarticulo->precio }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

<!--

                 <span>{{ $pedidoarticulo->articulo_id}}</span>
                 <span class="total1">$ {{ $pedidoarticulo->precio }}</span>
                 <span>Budin</span>
                 <span class="total1">80.00</span>
                 <span>Pan Dulce</span>
                 <span class="total1">150.00</span>
-->                 
                 <div class="clearfix"></div>                
             </div> 
             <ul class="total_price">
               <li class="last_price"> <h4>TOTAL</h4></li>  
               <li class="last_price"><span>{{ $pedido->pedidoarticulos->sum('precio') }}</span></li>
               <div class="clearfix"> </div>
             </ul>


<script>

//                                    $('.btn-danger').on('click', function(){
                                      function borraritem(btn_danger){
                                        console.log("llama a la funcion");
                                        var id_item = $(btn_danger).data('id');
                                        console.log(id_item);
//                                        $('.btn-danger').on('click', function(){
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
//                                        });
                                        };



</script>