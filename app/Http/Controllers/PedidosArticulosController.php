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
        //
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
        $pedidoarticulo->precio = $articulo->precio;

        // dd($_GET['algo']);
        $html = view('admin.pedidos.partials.items')
                   ->with('pedidoarticulo', $pedidoarticulo);

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
        //
    }

}
