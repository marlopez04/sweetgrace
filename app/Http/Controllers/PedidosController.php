<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Categoria;
use App\Articulo;
use App\ListaPrecio;
use App\Pedido;
use App\Cliente;
use App\Stock;

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
//        $nuevopedido->stock_id = $_GET['stock_id'];

        //3°
        $html = view('admin.pedidos.partials.pedido')
            ->with('pedido', $nuevopedido);

        return $html;

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
