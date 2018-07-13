<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PedidoArticulo;
use App\Pedido;
use App\Stock;
use App\StockIngredientes;
use App\StockInsumos;

class PedidosArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Layot de Sistema de riego

        return view('admin.template.riego');

        //Layot de Sistema de riego
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $articulo = Articulo::find($id);

//        dd($articulo);
        $pedidoarticulo = new PedidoArticulo();
        $pedidoarticulo->articulo_id = $articulo->id;
        $pedidoarticulo->descripcion = $articulo->nombre;
        $pedidoarticulo->pedido_id = $_GET['id_pedido'];
        $pedidoarticulo->cantidad = $_GET['cantidad'];
        $pedidoarticulo->precio = $articulo->precio * $pedidoarticulo->cantidad;
        $pedidoarticulo->save();

        $pedido = Pedido::find($pedidoarticulo->pedido_id);
        $pedido->load('pedidoarticulos');

// inicio suma de los importes

        $importepedido = 0;

        foreach ($pedido->pedidoarticulos as $pedarticulo) {

            $importepedido += $pedarticulo->precio;
        }

        $pedido->importe = $importepedido;
        $pedido->estado = 'pendiente';
        $pedido->save();

//fin suma de los importes

        //creo un elemento que que agrupe los items 23/06/2018 (id,descripcion, cantidad, precio)
        $idp = $pedido->id;
        $pedidoarticulos = \DB::select("SELECT
                                            max(pa.id) as id,
                                            pa.descripcion as descripcion,
                                            sum(pa.cantidad) as cantidad,
                                            sum(pa.precio) as precio
                                        FROM pedidoarticulos pa
                                        INNER JOIN articulos a on a.id = pa.articulo_id
                                        WHERE pedido_id = '{$idp}'
                                        group by a.id");

        //dd($pedidoarticulos);


        // dd($_GET['algo']);
        $html = view('admin.pedidos.partials.items')
                   ->with('pedido', $pedido);
        //comentado 23/06/2018
        /*

        $html = view('admin.pedidos.partials.items')
                   ->with('pedidoarticulos', $pedidoarticulos);
        */
        //comentado 23/06/2018

         return $html;
        // return view('admin.pedidos.partials.items');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidoarticulo = PedidoArticulo::find($id);
        $pedidoarticulo->delete();

        $pedido = Pedido::find($pedidoarticulo->pedido_id);
        $pedido->load('pedidoarticulos');

// inicio suma de los importes

        $importepedido = 0;

        foreach ($pedido->pedidoarticulos as $pedarticulo) {

            $importepedido += $pedarticulo->precio;
        }

        $pedido->importe = $importepedido;
        $pedido->estado = 'pendiente';
        $pedido->save();

//fin suma de los importes


        $html = view('admin.pedidos.partials.items')
                   ->with('pedido', $pedido);

         return $html;
        // return view('admin.pedidos.partials.items');
    }

}
