        <div class="women">
            <h4>Articulos</h4>
             <div class="clearfix"></div>   
        </div>
        <!-- grids_of_4 -->
   <?php $cantidad =0; ?>
          @foreach($articulos as $articulo)
          <div class="grid1_of_4">
                     <div class="content_box">
                      <h4>{{$articulo->nombre}}</h4>
                      <a href="" class="articulo" data-id="{{ $articulo->id}}">
                       <img src="{{ asset('imagenes/articulos/' . $articulo->imagen) }}" class="img" alt="">
                      </a>
                     <div class="grid_1 simpleCart_shelfItem">
                     <div class="item_add"><span class="item_price">
                        <h6> ${{ $articulo->precio}}</h6>
                     </div>
                    <div class="item_add"><span class="item_price">
                      <a href="">Editar</a></span>
                      <a href="" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger" id="prueba">Eliminar</a>
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