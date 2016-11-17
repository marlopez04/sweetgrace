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
          @foreach($categorias as $categoria)
          <div class="grid1_of_4">
                <div class="content_box"><a href="">
                     <img src="{{ asset('imagenes/categorias/' . $categoria->imagencategoria->nombre ) }}" class="img" alt="">
                      </a>
                    <h4><a href=""> {{$categoria->nombre}}</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $99.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">Editar</a></span></div>
                     </div>
                </div>
            </div>
            @endforeach

            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/006.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $76.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/011.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $58.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/013.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $112.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        
        
        <div class="grids_of_4">
         <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/014.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $109.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/019.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $95.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/020.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $68.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/021.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $74.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="grids_of_4">
          <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/022.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $80.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/024.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $65.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/005.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $90.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="grid1_of_4">
                <div class="content_box"><a href="details.html">
                     <img src="{{asset('plugins/carousel-slider/img/011.jpg')}}" class="img" alt="">
                      </a>
                    <h4><a href="details.html"> Duis autem</a></h4>
                     <p>It is a long established fact that</p>
                     <div class="grid_1 simpleCart_shelfItem">
                    
                     <div class="item_add"><span class="item_price"><h6>ONLY $75.00</h6></span></div>
                    <div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
                     </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- end grids_of_4 -->

        
    </div>
</div>
<!-- articulos de la categoria-->

@endsection






