@extends('admin.template.main')

@section('title', 'Articulos')

@section('content')

          <!-- articulos de la categoria-->
<div class="women_main">
<div class="w_content">
        <div class="women">
            <h4>Articulos</h4>
            <a href="{{ route('admin.articulos.create') }}" class="btn btn-info">Registrar nuevo Articulo</a><hr>
             <div class="clearfix"></div>   
        </div>
        <!-- grids_of_4 -->
        <div class="grids_of_4">
          <?php $cantidad =0; ?>
          @foreach($articulos as $articulo)
          <div class="grid1_of_4">
                     <div class="content_box"><a href="">
                      <h4><a href=""> {{$articulo->nombre}}</a></h4>
                       <img src="{{ asset('imagenes/articulos/' . $articulo->imagen) }}" class="img" alt="">
                      </a>
                     <div class="grid_1 simpleCart_shelfItem">
                      <h6> {{ $articulo->categoria->nombre}}</h6>
                      <h6> Lista :{{ $articulo->listaprecio->nombre}}  </h6>
                      <h6>{{ $articulo->user->name}}</h6>
                     <div class="item_add"><span class="item_price">
                        <h6> ${{ $articulo->precio}}</h6>
                     </div>
                    <div class="item_add"><span class="item_price">
                      <a href="{{ route('admin.articulos.edit', $articulo->id) }}">Editar</a></span>
                      <a href="{{ route('admin.articulos.destroy', $articulo->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger">Eliminar</a>
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
            {!! $articulos->render() !!}
        </div>

    </div>
</div>
<!-- articulos de la categoria-->

@endsection