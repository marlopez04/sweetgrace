<?php

namespace App\Http\Controllers;

use App\Stock;
use App\StockInsumo;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StockInsumosController extends Controller
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
        $stockinsumo = new StockInsumo();
        $stockinsumo->stock_id = $_GET['id_stock'];
        $stockinsumo->insumo_id = $_GET['id_insumo'];
        $stockinsumo->nombre = $_GET['nombre'];
        $stockinsumo->cantidad = $_GET['cantidad'];
        $stockinsumo->costo = $_GET['costo'];

        if ($stockinsumo->cantidad >= 500){
            $stockinsumo->unidad = 100;
            $stockinsumo->costo_u = $stockinsumo->costo * 100 / $stockinsumo->cantidad;
        }else{
            $stockinsumo->unidad = 1;
            $stockinsumo->costo_u = $stockinsumo->costo / $stockinsumo->cantidad;
        }

        $stockinsumo->save();

        $stock = Stock::find($stockinsumo->stock_id);
        $stock->load('stockinsumos', 'stockingredientes');

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
        $stockinsumo = StockInsumo::find($id);
        $stockinsumo->delete();

        $stock = Stock::find($stockinsumo->stock_id);
        $stock->load('stockinsumos', 'stockingredientes');

        $html = view('admin.stocks.partials.insumosingredientes')
                   ->with('stock', $stock);

         return $html;
    }
}
