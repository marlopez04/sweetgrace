@extends('admin.template.main')

@section('title', 'Categorias')

@section('content')

          <!-- articulos de la categoria-->
<div class="women_main">
<div class="w_content">
        <div class="women">
            <h4>Categorias</h4>
             <div class="clearfix"></div>   
        </div>
        <!-- grids_of_4 -->
        <div class="grids_of_4">
          <?php $cantidad =0; ?>
          @foreach($categorias as $categoria)
          <div class="grid1_of_4">
                     <div class="content_box"><a href="">
                      <h4><a href=""> {{$categoria->nombre}}</a></h4>
                       <img src="{{ asset('imagenes/categorias/' . $categoria->imagen) }}" class="img" alt="">
                      </a>
                     <div class="grid_1 simpleCart_shelfItem">
                     <div class="item_add"><span class="item_price"></div>
                    <div class="item_add"><span class="item_price">
                      <a href="{{ route('admin.categorias.edit', $categoria->id) }}">Editar</a></span>
                      <a href="{{ route('admin.categorias.destroy', $categoria->id) }}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-danger">Eliminar</a>
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
            {!! $categorias->render() !!}
        </div>

    </div>
</div>
<!-- articulos de la categoria-->

@endsection






