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

<div class="monthly-grid" id="pedidoinfo">

<!--Variables para la cobranza INICIO-->
          <?php $debe = $pedido->importe; ?>
        <?php $pagos = 0; ?>
<!--Variables para la cobranza FIN-->

  <div class="panel panel-widget">
      <div class="panel-body">

                <div class="row">
        <!-- status -->
        <div class="col-md-8">

        <div id="datospedido" >
			{!! Form::hidden('id_pedido',$pedido->id,['class'=>'pedidoid'])!!}
			{!! Form::hidden('id_stock',$pedido->stock_id,['class'=>'stockid'])!!}
          {!! Form::open(['route' =>['admin.pedidos.update', $pedido], 'method' => 'PUT', 'files' => true]) !!}
          <table class="table table-striped">
              <thead>
                <th>Cliente</th>
                <th>Entrega</th>
                <th>Pago</th>
                <th>Estado</th>
                <th></th>
              </thead>
              <tbody>
                  <tr>
                    <td>{{ $pedido->cliente->nombre }}</td>
                    <td>{!! Form::date('entrega',Carbon\Carbon::parse($pedido->entrega),['class'=>'form-control', 'required'])!!}</td>
                    <td>{!! Form::number('pago',0,['class'=>'form-control'])!!}</td>
                    @if ($pedido->estaod <> 'entregado')
                      <td>{!! Form::select('estado', ['borrar' => 'BORRAR','pendiente' => 'PENDIENTE','confirmado' => 'CONFIRMADO', 'a entregar' => 'A ENTREGAR', 'entregado' => 'ENTREGADO'], $pedido->estado, ['class' => 'form-control select-category'])!!}</td>
                    @else
                      <td>{!!$pedido->estado!!}</td>
                    @endif
                    
                    <td>{!! Form::submit('Confirmar',['class' =>'btn btn-primary']) !!}</td>
                  </tr>
                    {!!Form::close()!!}

@if( $cobrado <> 0)

<tr bgcolor="#B52E31" ><td colspan= "4" align= "center"> <font color="#fff">Pagos</font></td></tr>

                @foreach($pedido->cobranzas as $cobranza)
                <tr>
                  <td>
                    <a href="{{ route('admin.cobranzas.destroy', $cobranza->id) }}" class='btn_danger'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    {{ $cobranza->tipo }}
                  </td>
                  <td >
                    {{ date("d-m-Y", strtotime($cobranza->created_at)) }}
                  </td>
                  <td>{{ $cobranza->user->name }}</td>
                  <td>
                      {{ $cobranza->importe}}
                      <?php $pagos = $pagos + $cobranza->importe; ?>
                      <?php $debe = $debe - $cobranza->importe; ?>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan= "3" align= "right">Total</td>
                  <td>{{$pagos}}</td>
                </tr>
                <tr>
                  <td colspan= "3" align= "right">Debe</td>
                  <td>{{$debe}}</td>
                </tr>
@endif
              </tbody>
            </table>
      </div>

    <div class="panel-title">
@if($pedido->estado <> 'entregado')
      <h4>Lista de Precio</h4>
      {!! Form::select('lista_id', $listasprecios, null, ['class' => 'form-control select-category', 'id' => 'lista_id']) !!}
            <h4>Categorias</h4>
@endif
    </div>

@if($pedido->estado <> 'entregado')
              <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden; visibility: hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('{{asset('plugins/carousel-slider/img/loading.gif')}}') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
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
@endif
            

          <div class="col-6">
            <div id="divcarga" hidden>
              <label class="articuloelegido" hidden></label>
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
                                <a href="#" class = "btn btn-primary" id="cargararticulo">Cargar</td>
                            </tr>
                        </tbody>
              </table>
            </div>
        </div>


        </div>


            <div class="col-md-1"><h4>   </h4></div>
                <!-- carrito de compras -->
            <div class="col-md-3 cart-total" id="itemcontent">
             <H6 class="continue">Pedido</H6>
             <div id="items2">
             	
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
                        @if($pedido->estado <> 'entregado')
	                         <a href="javascript:void(0)" class='btn_danger' onclick='borraritem2(this)' data-id="{{ $pedidoarticulo->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        @endif
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

             </div>

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

<div class="clearfix"></div>
          <!-- articulos de la categoria-->
<div class="women_main"  id="articulocontent" hidden>

<div class="w_content">
  <!-- principio de ajax -->

<!-- fin del ajax -->                  
        </div>


    </div>

<!-- INICIO con el id del cliente crea un nuevo pedido-->

{!! Form::open(['route' => ['admin.pedidos.show', ':CLIENTE_ID'], 'method' => 'POST' , 'id' => 'form-cliente' ]) !!}
{!! Form::close() !!}

<!-- FIN con el id del cliente crea un nuevo pedido-->

<!-- INICIO trae los articulos de cada categoria-->

{!! Form::open(['route' => ['admin.categorias.show', ':CATEGORIA_ID'], 'method' => 'POST' , 'id' => 'form-categoria' ]) !!}
{!! Form::close() !!}

<!-- FIN trae los articulos de cada categoria-->

<!-- INICIO carga el articulo selccionado como item del pedido-->

{!! Form::open(['route' => ['admin.pedidosarticulos.show', ':ARTICULO_ID'], 'method' => 'POST' , 'id' => 'form-articulo' ]) !!}
{!! Form::close() !!}

<!-- FIN carga el articulo selccionado como item del pedido-->

<!-- INICIO carga el articulo selccionado como item del pedido-->

{!! Form::open(['route' => ['admin.pedidosarticulos.destroy', ':ITEM_ID'], 'method' => 'POST' , 'id' => 'form-deleteitem' ]) !!}
{!! Form::close() !!}

<!-- FIN carga el articulo selccionado como item del pedido-->



<div class="clearfix"></div>

<div id="correctorscroll">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

@endsection

@section('js')

<script>

function borraritem2(btn_danger){
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

/*
           $('#itemcontent').hide();                                          
           $('#items2').hide
*/

          $('#items2').hide();
          $('#items').fadeOut().html(items).fadeIn();
/*
           $('#items').fadeOut().html(items).fadeIn();
           $('#items').show();
*/
           });
  };


  $(document).ready(function(){
//creacion de pedido nuevo

/*
    $('.btn-warning').click(function(){

          var id_cliente = $(this).data('id');
          console.log(id_cliente);
          var form = $('#form-cliente');
          var url = form.attr('action').replace(':CLIENTE_ID', id_cliente);
 //         var data = form.serialize();
          var token = form.serialize();
          data = {
            token: token,
            entrega: "sysdate",
            importe: "0",
            user_id: "{{ Auth::user()->id }}",
            cliente_id: id_cliente,
            estado: "0",
            stock_id: "1"
          };
          console.log(data);
          $.get(url, data, function(pedido){

                $('#pedidoinfo').show();
                $('#datoscliente').hide();
                $('#correctorscroll').hide();
                $('#datospedido').fadeOut().html(pedido).fadeIn();

//                $("body").animate({ scrollTop: $(document).height()}, 500);
*/
//traer los articulos de cierta categoria
                $('.categoria').click(function(){
                    var id_categoria = $(this).data('id');
                    var lista_id = $('#lista_id').val();
                    console.log(lista_id);
                    var form = $('#form-categoria');
                    var url = form.attr('action').replace(':CATEGORIA_ID', id_categoria);
                    var token = form.serialize();
                    var tipo = 1;
                      data = {
                        token: token,
                        lista_id: lista_id,
                        tipo: tipo
                      };


                    $.get(url, data, function(articulos){
                        
                          $('#articulocontent').show();
                          $('.w_content').fadeOut().html(articulos).fadeIn();
//                          $("body").animate({ scrollTop: $(document).height()}, 500);


//                $('.w_content').html(articulos);

//funcion agregar el articulo al carrito de compras
                         $('.articulo').click(function(){
                           // var id_articulo = $(this).data('id');
  //04/07 mod
                            var articulo_nombre = $(this).data('name');

                            $('.articuloelegido').html($(this).data('id'));

                            $('.nombreMostrar').html(articulo_nombre);
                            console.log(articulo_nombre);

                            $('#divcarga').show();


//de aca
/*
                            $('#cargararticulo').click(function(){
                              
                              var id_articulo = $('.articuloelegido').html();

                              console.log("carga de articulo");
                              
                              var articulocantidad = $('#cantidad').val();
                              console.log(articulocantidad);
    //04/07 mod
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
  //fin de ajax carga de items             
                            });


                            });
*/
//hasta aca


//fin de click articulos
                      });
//fin de ok ajax categoria                 
          });
//fin de click categoria
      });
//fin de creacion del pedido
//});

//}); 

});

</script>

@endsection