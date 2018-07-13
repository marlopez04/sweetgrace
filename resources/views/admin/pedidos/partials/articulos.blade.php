        <!-- grids_of_4 -->
   <?php $cantidad =0; ?>   
   <?php $articulopagregar =0; ?>   
   <!--
    <div class="col-12">
    <table class="table table-striped">
              <thead>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th></th>
              </thead>
              <tbody>
                  <tr>
                    <td><label class="nombreMostrar"></label></td>
                    <td>
                    <input type="number" id="cantidad">
                    </td>
                    <td>
                      <a href="#" class="cargararticulo" data-id="" data-name="">Cargar</td>
                  </tr>
              </tbody>
    </table>
  </div>
-->
          @foreach($articulos as $articulo)
          <div class="grid1_of_4">
                     <div class="content_box">
                      <h4>{{$articulo->nombre}}</h4>
                      <a href="#" class="articulo" data-id="{{ $articulo->id}}" data-name="{{$articulo->nombre}}">
                       <img src="{{ asset('imagenes/articulos/' . $articulo->imagen) }}" class="img" alt="" style="width:200px;height:150px;">
                      </a>
                     <div class="grid_1 simpleCart_shelfItem">
                     <div class="item_add"><span class="item_price">
                        <h6> ${{ $articulo->precio}}</h6>
                        <h6> Lista: {{ $articulo->listaprecio->nombre}}</h6>
                     </div>
                    <div class="item_add"><span class="item_price">
                    </div>
                     </div>
                </div>
            </div>
            <?php $cantidad++  ?>
            @if ($cantidad == 4)
                </div>
                <div class="clearfix"></div>

                <?php $cantidad = 0; ?>

                <div class="grids_of_4">

            @endif
            @endforeach
        </div>
        <div class="clearfix"></div>
        <div class="text-center">






<script type="text/javascript">

  $('#cargararticulo').click(function(){
      
      var id_articulo = $('.articuloelegido').html();

      console.log("carga de articulo");
      
      var articulocantidad = $('#cantidad').val();
      console.log(articulocantidad);

      var id_pedido = $('.pedidoid').val();
      var id_stock = $('.stockid').val();
      var form = $('#form-articulo');
      var url = form.attr('action').replace(':ARTICULO_ID', id_articulo);
      var token = form.serialize();
      data = {
        token: token,
        id_articulo: id_articulo,
        cantidad: articulocantidad,
        id_pedido: id_pedido,
        id_stock: id_stock
      };
      console.log(data);

      $.get(url, data, function(items){

             $('#divcarga').hide();
             $('#items2').hide();
             $('#items').fadeOut().html(items).fadeIn();

    });


  });

</script>
