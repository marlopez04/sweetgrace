        <!-- grids_of_4 -->
   <?php $cantidad =0; ?>
          @foreach($articulos as $articulo)
          <div class="grid1_of_4">
                     <div class="content_box">
                      <h4>{{$articulo->nombre}}</h4>
                      <a href="#" class="articulo" data-id="{{ $articulo->id}}">
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