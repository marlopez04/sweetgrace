        <!-- grids_of_4 -->
   <?php $cantidad =0; ?>
          @foreach($articulos as $articulo)
          <div class="grid1_of_4">
                     <div class="content_box">
                      <h4>{{$articulo->nombre}}</h4>
                      <a href="{{ route('admin.articulos.edit', $articulo->id) }}" class="articulo" data-id="{{ $articulo->id}}">
                       <img src="{{ asset('imagenes/articulos/' . $articulo->imagen) }}" class="img" alt="" style="width:200;height:150;">
                      </a>
                     <div class="grid_1 simpleCart_shelfItem">
                     <div class="item_add"><span class="item_price">
                        <h6> Precio ${{ $articulo->precio}} Costo ${{ $articulo->receta->costo}} </h6>
                        <h6> Categoria: {{ $articulo->categoria->nombre}}</h6>
                        <h6> Lista: {{ $articulo->listaprecio->nombre}}</h6>
                     </div>
                    <div class="item_add"><span class="item_price">
                      <a href="{{ route('admin.recetas.edit', $articulo->receta_id) }}">Receta</a></span>
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