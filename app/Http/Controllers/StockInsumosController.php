<?php

namespace App\Http\Controllers;

use App\Stock;
use App\StockInsumo;
use App\Insumo;
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

        $insumo = Insumo::find($stockinsumo->insumo_id);

        $stockinsumo->unidad = $insumo->unidad;

        if ($insumo->unidad == 100) {
            $stockinsumo->costo_u = $stockinsumo->costo * 100 / $stockinsumo->cantidad;
        }else{
            $stockinsumo->costo_u = $stockinsumo->costo / $stockinsumo->cantidad;
        }
/*  Se quita esto para que al grabar el stock no se modifique la unidad del ingrediente INICIO

        if ($stockinsumo->cantidad >= 500){
            $stockinsumo->unidad = 100;
            $stockinsumo->costo_u = $stockinsumo->costo * 100 / $stockinsumo->cantidad;
        }else{
            $stockinsumo->unidad = 1;
            $stockinsumo->costo_u = $stockinsumo->costo / $stockinsumo->cantidad;
        }
    Se quita esto para que al grabar el stock no se modifique la unidad del ingrediente FIN */
        $stockinsumo->save();

        $stock = Stock::find($stockinsumo->stock_id);
        $stock->load('stockingredientes', 'stockinsumos');
        $stock->stockinsumos->load('insumo');
        $stock->stockingredientes->load('ingrediente');
        $costoinsumo = 0;
        $costoingrediente = 0;

        foreach($stock->stockinsumos as $stockinsu){
            $costoinsumo += $stockinsu->costo;
        }

        foreach($stock->stockingredientes as $stocking){
            $costoingrediente += $stocking->costo;
        }

        $stock->costo = $costoingrediente + $costoinsumo;

        $stock->save();


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

    public function mostrar($id)
    {
        $stock_id = $_GET['id_stock'];
        $insumo_id = $_GET['id_insumo'];
        $stock = Stock::find($stock_id);
        $insumo = Insumo::find($insumo_id);

        $html = view('admin.stocks.partials.cargarinsumos')
                  ->with('stock', $stock)
                  ->with('insumo',$insumo);

        return $html;

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

// recalcular el costo del stock
        $costoinsumo = 0;
        $costoingrediente = 0;

        foreach($stock->stockinsumos as $stockinsu){
            $costoinsumo += $stockinsu->costo;
        }

        foreach($stock->stockingredientes as $stocking){
            $costoingrediente += $stocking->costo;
        }

        $stock->costo = $costoingrediente + $costoinsumo;
        $stock->save();


        $html = view('admin.stocks.partials.insumosingredientes')
                   ->with('stock', $stock);

         return $html;
    }
}
