<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\User;
use App\Ingrediente;
use App\Insumo;
use App\Receta;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::orderBy('id', 'DECS')->paginate(5);
        $stocks->load('user');

        return view('admin.stocks.index')
            ->with('stocks', $stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock = new Stock();
        $stock->user_id = \Auth::user()->id;
//        $stock->tipo = 1;
//        $stock->estado = 1;
        $stock->save();
        $id = $stock->id;

           return redirect()->route('admin.stocks.edit', $id);
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
        $stock = Stock::find($id);
        $stock->load('stockingredientes', 'stockingredientes');

        $html = view('admin.stocks.partials.insumosingredientes')
                     ->with('stock', $stock);

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
        $stock = Stock::find($id);

        return view('admin.stocks.edit')
            ->with('stock', $stock);
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

//cargo todo el stock y le cambio el estado a confirmado        
        $stock = Stock::find($id);
        $stock->estado =  'confirmado';
        $stock->save();
        $stock->load('stockingredientes', 'stockinsumos');


//cargo los ingredientes/insumos del stock y actualizo los costos y cantidades
        foreach ($stock->stockingredientes as $stockingrediente) {

            $ingrediente = Ingrediente::find($stockingrediente->ingrediente_id);

            if ($stockingrediente->tipo == 'ingreso'){
                $ingrediente->cantidad = $ingrediente->cantidad + $stockingrediente->cantidad;
                $ingrediente->costo_u = $stockingrediente->costo_u;
                $ingrediente->unidad = $stockingrediente->unidad;
            }else{
                $ingrediente->cantidad = $ingrediente->cantidad - $stockingrediente->cantidad;
            }

            $ingrediente->save();
        }

        foreach ($stock->stockinsumos as $stockinsumo) {

            $insumo = Insumo::find($stockinsumo->insumo_id);

            if ($stockinsumo->tipo == 'ingreso'){
                $insumo->cantidad = $insumo->cantidad + $stockinsumo->cantidad;
                $insumo->costo_u = $stockinsumo->costo_u;
                $insumo->unidad = $stockinsumo->unidad;
            }else{
                $insumo->cantidad = $insumo->cantidad - $stockinsumo->cantidad;
            }

            $insumo->save();

        }

        return view('admin.stocks.edit')
            ->with('stock', $stock);

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
