<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade;
use App\Categoria;
use App\Articulo;
use App\ListaPrecio;
use App\Pedido;
use App\Cliente;
use App\Stock;
use App\StockIngrediente;
use App\StockInsumo;
use App\Ingrediente;
use App\Insumo;
use App\Movimiento;
use Carbon\Carbon;
use App\Cobranza;


class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientes = Cliente::Search($request->nombre)->orderBy('id', 'DESC')->paginate(3);
        $articulos = Articulo::all();
        $categorias = Categoria::all();
     //   $clientes = Cliente::orderBy('id','ASC')->paginate(5);
        
        return view('admin.pedidos.create')
            ->with('articulos', $articulos)
            ->with('categorias', $categorias)
            ->with('clientes', $clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //por ahora redirijo hasta que haga una vista pedido.show
        return redirect()->route('admin.pedidos.edit', $id);

//vieja forma de crear el pedido INICIO
/*

        // 1° crear el stock
        // 2° crear el pedido y asociar el stock creado
        // 3° retornar datos del pedido

        //recupera el clinete
        $cliente = Cliente::find($id);

        //1°
        //arma una variable para grabar un stock nuevo
        $nuevostock = new Stock();
        $nuevostock->user_id = $_GET['user_id'];
        $nuevostock->save();

        //2°
        //arma una variable para grabar un pedido nuevo
        $nuevopedido = new Pedido();
        $nuevopedido->entrega = $_GET['entrega'];
        $nuevopedido->importe = $_GET['importe'];
//        $nuevopedido->cliente_id = $cliente->nombre;
        $nuevopedido->cliente_id = $cliente->id;
//        $nuevopedido->cliente_id = $id;
        $nuevopedido->estado = $_GET['estado'];
        $nuevopedido->user_id = $_GET['user_id'];
        $nuevopedido->stock_id = $nuevostock->id;
        $nuevopedido->save();

        
        $nuevopedido->load('cliente');
        $nuevopedido->load('user');
//        $nuevopedido->stock_id = $_GET['stock_id'];

        //3°
        $html = view('admin.pedidos.partials.pedido')
            ->with('pedido', $nuevopedido);

        return $html;
*/
//vieja forma de crear el pedido FIN

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);
        $categorias = Categoria::all();
        $listasprecios = ListaPrecio::orderBy('id', 'DECS')->lists('nombre', 'id');

        $pedido->load('cliente');
        $pedido->load('user');
        $pedido->load('cobranzas');
        $pedido->cobranzas->load('user');

        $cobrado = 0;

        foreach($pedido->cobranzas as $cobranza1){
                $cobrado = $cobrado + $cobranza1->importe;
        }

        return view('admin.pedidos.edit')
            ->with('pedido', $pedido)
            ->with('listasprecios', $listasprecios)
            ->with('categorias', $categorias)
            ->with('cobrado', $cobrado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //recupero el pedido
        $pedido = Pedido::find($id);
        $pago = 0;

        //recupero la fecha del dia y la transformo en un periodo EJ: 201705
        $sysdate = Carbon::now(); //recupero el sysdate
        $periodoactual = $sysdate->format('Ym');

        //Actualizo el importe del movimiento relacionado
        $movimiento = Movimiento::find($pedido->movimiento_id);
        $movimiento->importe = $pedido->importe;
        $movimiento->periodo = $periodoactual;
        $movimiento->save();

        if ($pedido->estado == 'pendiente'){

            //controlo que el campo pago no este vacio
            if($request->pago <> 0 and $pago == 0){
                $cobranza = new Cobranza();
                $cobranza->pedido_id = $id;
                $cobranza->tipo = 'seña';
                $cobranza->importe = $request->pago;
                $cobranza->user_id = \Auth::user()->id;
                $cobranza->save();
                $pago = 1;
            }

            //recupero las cobranzas
            $pedido->load('cobranzas');
            $cobrado = 0;

            //sumo todo lo cobrado
            foreach($pedido->cobranzas as $cobranzap){
                $cobrado = $cobranzap->importe;

            }

            //calculo cuanto se debe
            if($pedido->importe <= $cobrado){
                $pedido->cobranza = 'pagado';
            }


            //grabo el stock_id en una variable
            $stockviejo_id = $pedido->stock_id;

            //creo un nuevo stock
            $nuevostock = new Stock();
            $nuevostock->tipo = 'negativo';
            $nuevostock->user_id = \Auth::user()->id;
            $nuevostock->movimiento_id = $movimiento->id;
            $nuevostock->save();

            //asigno el nuevo stock al pedido        
            $pedido->stock_id = $nuevostock->id;
            $pedido->entrega = $request->entrega;
            $pedido->estado = $request->estado;
            $pedido->save();

            //borro el viejo stock
            $stock = Stock::find($stockviejo_id);
            $stock->delete();


            // selecciono las recetas, sumo los ingredientes y los devuelve sumados (ingrediente_id, nombre, cantidad)

           $dataingredientes = \DB::select("SELECT ri.ingrediente_id as ingrediente_id, ri.nombre as nombre, sum(ri.cantidad) as cantidad
                                        FROM pedidoarticulos pa
                                        INNER JOIN articulos a on a.id = pa.articulo_id
                                        INNER JOIN recetas r on r.id = a.receta_id
                                        INNER JOIN recetaingredientes ri on ri.receta_id = r.id
                                        WHERE pedido_id = '{$id}'
                                        group by ri.ingrediente_id");

            // selecciono las recetas, sumo los insumos y los devuelve sumados (ingrediente_id, nombre, cantidad)

            $datainsumos = \DB::select("SELECT ri.insumo_id as insumo_id, ri.nombre as nombre, sum(ri.cantidad) as cantidad
                                    FROM pedidoarticulos pa
                                    INNER JOIN articulos a on a.id = pa.articulo_id
                                    INNER JOIN recetas r on r.id = a.receta_id
                                    INNER JOIN recetainsumos ri on ri.receta_id = r.id
                                    WHERE pedido_id = '{$id}'
                                    group by ri.insumo_id");

            //recorro la consulta de ingredientes y los agrego al stock del pedido
            foreach ($dataingredientes as $ingrediente){
                $stockingrediente = new StockIngrediente();
                $stockingrediente->stock_id = $pedido->stock_id;
                $stockingrediente->nombre = $ingrediente->nombre;
                $stockingrediente->tipo = 'egreso';
                $stockingrediente->ingrediente_id = $ingrediente->ingrediente_id;
                $stockingrediente->cantidad = $ingrediente->cantidad;
                $stockingrediente->costo = 0;
                $stockingrediente->save();
            }

            //recorro la consulta de insumos y los agrego al stock del pedido
            foreach ($datainsumos as $insumo){
                $stockinsumo = new StockInsumo();
                $stockinsumo->stock_id = $pedido->stock_id;
                $stockinsumo->nombre = $insumo->nombre;
                $stockinsumo->tipo = 'egreso';
                $stockinsumo->insumo_id = $insumo->insumo_id;
                $stockinsumo->cantidad = $insumo->cantidad;
                $stockinsumo->costo = 0;
                $stockinsumo->save();
            }

            //recupero el Stock completo
            $stock = Stock::find($pedido->stock_id);
            $stock->load('stockinsumos','stockingredientes');

            $idnuevo = $pedido->id;

            return redirect()->route('admin.pedidos.edit', $idnuevo);

        }else{ //controlo el cambio del pedido que ya paso por "pendiente" a 'para entregar'/'entregado'

            $pedido->estado = $request->estado;
            $pedido->entrega = $request->entrega;
            $pedido->save();


            if($request->pago <> 0 and $pago == 0){
                $cobranza = new Cobranza();
                $cobranza->pedido_id = $id;
                $cobranza->tipo = 'pago';
                $cobranza->importe = $request->pago;
                $cobranza->user_id = \Auth::user()->id;
                $cobranza->save();
                $pago = 1;
            }

            //recupero las cobranzas
            $pedido->load('cobranzas');
            $cobrado = 0;

            //sumo todo lo cobrado
            foreach($pedido->cobranzas as $cobranzap){
                $cobrado +=  $cobranzap->importe;
            }

            //calculo cuanto se debe
            if($pedido->importe <= $cobrado){
                $pedido->cobranza = 'pagado';
            }


            if($pedido->estado == 'entregado'){


                if($request->pago <> 0 and $pago == 0){
                    $cobranza = new Cobranza();
                    $cobranza->pedido_id = $id;
                    $cobranza->tipo = 'pago';
                    $cobranza->importe = $request->pago;
                    $cobranza->user_id = \Auth::user()->id;
                    $cobranza->save();
                    $pago = 1;
                }

                //recupero las cobranzas
                $pedido->load('cobranzas');

                //sumo todo lo cobrado
                foreach($pedido->cobranzas as $cobranzap){
                    $cobrado += $cobranzap->importe;
                }

                //calculo cuanto se debe
                if($pedido->importe <= $cobrado){
                    $pedido->cobranza = 'pagado';
                }

                //se confirma el STOCK que posee el pedido

                //cargo todo el stock y le cambio el estado a confirmado        
                $stock = Stock::find($pedido->stock_id);
                //controlo que el pedido no alla sido entregado, para no duplicar el descuento del stock
                if($stock->estado == 'pendiente'){
                
                    $stock->estado = 'confirmado';
                    $stock->save();
                    $stock->load('stockingredientes', 'stockinsumos');


            //cargo los ingredientes/insumos del stock y actualizo los costos y cantidades
                    foreach ($stock->stockingredientes as $stockingrediente) {

                        $ingrediente = Ingrediente::find($stockingrediente->ingrediente_id);

                        if ($stockingrediente->tipo == 'ingreso'){
                            $ingrediente->cantidad = $ingrediente->cantidad + $stockingrediente->cantidad;
                            if($stockingrediente->costo_u <> 0 ){
                                $ingrediente->costo_u = $stockingrediente->costo_u;
                                $ingrediente->unidad = $stockingrediente->unidad;
                            }
                        }else{
                            $ingrediente->cantidad = $ingrediente->cantidad - $stockingrediente->cantidad;
                        }

                        $ingrediente->save();
                    }

                    foreach ($stock->stockinsumos as $stockinsumo) {

                        $insumo = Insumo::find($stockinsumo->insumo_id);

                        if ($stockinsumo->tipo == 'ingreso'){
                            $insumo->cantidad = $insumo->cantidad + $stockinsumo->cantidad;
                            if($stockinsumo->costo_u <> 0){
                                $insumo->costo_u = $stockinsumo->costo_u;
                                $insumo->unidad = $stockinsumo->unidad;
                            }
                        }else{
                            $insumo->cantidad = $insumo->cantidad - $stockinsumo->cantidad;
                        }

                        $insumo->save();
    
                    } //fin foreach stockinsumos

                } //endif controla que no alla sido entregado ya el pedido

                return redirect()->route('admin.pedidos.edit', $id);

            } //fin de if control de estado en ENTREGADO

            return redirect()->route('admin.pedidos.edit', $id);

        } //fin de primer if control de estado en PENDIENTE

      
    }

    public function imprimir($id)
    {
        $html = view('admin.precios.partials.imprimir')
                   ->with('listaprecios', $listaprecios);

       $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHTML($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('listaprecio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function nuevo($id)
    {
        $cliente = Cliente::find($id);
        $categorias = Categoria::all();

        //1°
        //Crea el movimiento contable postivo por tratarse de un ingreso
        $movimiento = new Movimiento();
        $movimiento->tipo = 'ingreso';
        $movimiento->user_id = \Auth::user()->id;
        $movimiento->importe = 0;
        $movimiento->relacion = 'pedido';
        $movimiento->save();


        //2°
        //arma una variable para grabar un stock nuevo
        $nuevostock = new Stock();
        $nuevostock->tipo = 'negativo';
        $nuevostock->user_id = \Auth::user()->id;
        $nuevostock->movimiento_id = $movimiento->id;
        $nuevostock->save();

        //3°
        //arma una variable para grabar un pedido nuevo
        $nuevopedido = new Pedido();
        $nuevopedido->entrega = date('Y-m-d_His');
        $nuevopedido->importe = 0;
//        $nuevopedido->cliente_id = $cliente->nombre;
        $nuevopedido->cliente_id = $cliente->id;
//        $nuevopedido->cliente_id = $id;
        $nuevopedido->estado = 'pendiente';
        $nuevopedido->user_id = \Auth::user()->id;
        $nuevopedido->stock_id = $nuevostock->id;
        $nuevopedido->movimiento_id = $movimiento->id;
        $nuevopedido->save();

        $movimiento->detalle = 'Ingreso por el pedido N° ' . $nuevopedido->id;
        $movimiento->save();

//        $nuevopedido->stock_id = $_GET['stock_id'];
        $idnuevo = $nuevopedido->id;

        //3°
        return redirect()->route('admin.pedidos.edit', $idnuevo);
//        return redirect()->route('admin.recetas.edit', $id);
//            ->with('pedido', $nuevopedido)
//            ->with('categorias', $categorias);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function guardar($id)
    {
        $pedido = Pedido::find($id);
/*
        switch($pedido->estado){
            case 'confirmado';
            
                $html = view('admin.precios.partials.listavieja')
                   ->with('listaprecios', $listaprecios);

                 return $html;

            break;

        if($pedido->estado == ''){

        }
*/
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
