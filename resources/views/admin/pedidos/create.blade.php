@extends('admin.template.main')

@section('title', 'Pedido Nuevo')

@section('content')

    <script src="{{asset('plugins/carousel-slider/js/jquery-1.11.3.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/carousel-slider/js/jssor.slider-21.1.6.mini.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            var jssor_1_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 4,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 3,
              $Cols: 4,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 4
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
              }
            };
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 809);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
        });
    </script>
    <style>
        /* jssor slider bullet navigator skin 03 css */
        /*
        .jssorb03 div           (normal)
        .jssorb03 div:hover     (normal mouseover)
        .jssorb03 .av           (active)
        .jssorb03 .av:hover     (active mouseover)
        .jssorb03 .dn           (mousedown)
        */
        .jssorb03 {
            position: absolute;
        }
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
            position: absolute;
            /* size of bullet elment */
            width: 21px;
            height: 21px;
            text-align: center;
            line-height: 21px;
            color: white;
            font-size: 12px;
            background: url('{{asset('plugins/carousel-slider/img/b03.png')}}') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
        /* jssor slider arrow navigator skin 03 css */
        /*
        .jssora03l                  (normal)
        .jssora03r                  (normal)
        .jssora03l:hover            (normal mouseover)
        .jssora03r:hover            (normal mouseover)
        .jssora03l.jssora03ldn      (mousedown)
        .jssora03r.jssora03rdn      (mousedown)
        .jssora03l.jssora03ldn      (disabled)
        .jssora03r.jssora03rdn      (disabled)
        */
        .jssora03l, .jssora03r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('{{asset('plugins/carousel-slider/img/a03.png')}}') no-repeat;
            overflow: hidden;
        }
        .jssora03l { background-position: -3px -33px; }
        .jssora03r { background-position: -63px -33px; }
        .jssora03l:hover { background-position: -123px -33px; }
        .jssora03r:hover { background-position: -183px -33px; }
        .jssora03l.jssora03ldn { background-position: -243px -33px; }
        .jssora03r.jssora03rdn { background-position: -303px -33px; }
        .jssora03l.jssora03lds { background-position: -3px -33px; opacity: .3; pointer-events: none; }
        .jssora03r.jssora03rds { background-position: -63px -33px; opacity: .3; pointer-events: none; }
    </style>


<div class="monthly-grid">
  <div class="panel panel-widget">
      <div class="panel-body">

                <div class="row">
        <!-- status -->
        <div class="col-md-8">

          <table class="table table-striped">
              <thead>
                <th>Cliente</th>
                <th>Pedido</th>
                <th>Entrega</th>
                <th>Importe</th>
              </thead>
              <tbody>
                  <tr>
                    <td>juan</td>
                    <td>12-12-2016</td>
                    <td>20-12-2016</td>
                    <td>$ 50</td>
                  </tr>
              </tbody>
            </table>

    <div class="panel-title">
            <h4>Categorias</h4>
    </div>

              <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden; visibility: hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('{{asset('plugins/carousel-slider/loading.gif')}}') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden;">
                        @foreach ($categorias as $categoria)
                            <div style="display: none;">
                              <a href="#" class="categoria" data-id="{{ $categoria->id}}">
                                <img data-u="image" src="{{asset('imagenes/categorias/' . $categoria->imagen)}}" />
                                </a>
                            </div>
                        @endforeach
                </div>
                <!-- Bullet Navigator -->
                <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
                    <!-- bullet navigator item prototype -->
                    <div data-u="prototype" style="width:21px;height:21px;">
                        <div data-u="numbertemplate"></div>
                    </div>
                </div>
                <!-- Arrow Navigator -->
                <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
                <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
            </div>
            
        </div>
            <div class="col-md-1"><h4>   </h4></div>
                <!-- carrito de compras -->
            <div class="col-md-3 cart-total">
             <a class="continue" href="#">Pedido</a>
             <div id="items">
             <!-- contenido del carrito-->
             </div>
            </div>
            <!-- carrito de compras -->

      </div>
      <!-- status -->
            </div>
    </div>
  </div>

          <!-- articulos de la categoria-->
<div class="women_main">

<div class="w_content">
  <!-- principio de ajax -->

<!-- fin del ajax -->                  
        </div>


    </div>
</div>

<!-- articulos de la categoria-->


{!! Form::open(['route' => ['admin.categorias.show', ':CATEGORIA_ID'], 'method' => 'POST' , 'id' => 'form-categoria' ]) !!}
{!! Form::close() !!}

{!! Form::open(['route' => ['admin.pedidosarticulos.show', ':PEDIDO_ID'], 'method' => 'POST' , 'id' => 'form-articulo' ]) !!}
{!! Form::close() !!}


@endsection

@section('js')

<script>
  $(document).ready(function(){
      $('.categoria').click(function(e){
          e.preventDefault();
          var id_categoria = $(this).data('id'); 
          var form = $('#form-categoria');
          var url = form.attr('action').replace(':CATEGORIA_ID', id_categoria);
          var data = form.serialize();
          $.get(url, data, function(data){
              
                $('.w_content').fadeOut().html(data).fadeIn();
          });
      });

      $('.articulo').click(function(e){
          e.preventDefault();
          var id_pedido = $(this).data('id'); 
          var form = $('#form-delete');
          var url = form.attr('action').replace(':PEDIDO_ID', id_pedido);
          var data = form.serialize();
          $.get(url, data, function(data){
              
                $('#items').fadeOut().html(data).fadeIn();
          });
      });


  });
</script>

@endsection



