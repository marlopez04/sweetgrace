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

        
        $nuevopedido->load('cliente');
        $nuevopedido->load('user');
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
        $pedido = Pedido::find($id);
        $categorias = Categoria::all();

        $pedido->load('cliente');
        $pedido->load('user');

        return view('admin.pedidos.edit')
            ->with('pedido', $pedido)
            ->with('categorias', $categorias);        
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

// selecciono transforma las recetas, suma los ingredientes y los devuelve sumados (ingrediente_id, cantidad)
/*
        $data = \DB::select('select ri.ingrediente_id as ingrediente_id, sum(ri.cantidad) as cantidad
                            from recetas r
                            inner join recetaingredientes ri on ri.receta_id = r.id
                            where articulo_id in
                            (SELECT articulo_id
                            FROM pedidoarticulos
                            WHERE pedido_id = '$id')
                            group by ri.ingrediente_id');

        return $data;
*/      
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
        //arma una variable para grabar un stock nuevo
        $nuevostock = new Stock();
        $nuevostock->user_id = \Auth::user()->id;
        $nuevostock->save();

        //2°
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
        $nuevopedido->save();

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
    public function destroy($id)
    {
        //
    }
}
