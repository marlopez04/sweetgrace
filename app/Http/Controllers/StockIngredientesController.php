<?php

namespace App\Http\Controllers;
use App\Stock;
use Illuminate\Http\Request;
use App\StockIngrediente;
use App\Ingrediente;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class StockIngredientesController extends Controller
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
        return view('admin.ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingrediente = new Ingrediente($request->all());
        $ingrediente->save();
        
        Flash::warning('El ingrediente '. $ingrediente->name . ' ha sido creado con exito');
        return redirect()->route('admin.ingredientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stockingrediente = new StockIngrediente();
        $stockingrediente->stock_id = $_GET['id_stock'];
        $stockingrediente->nombre = $_GET['nombre'];
        $stockingrediente->ingrediente_id = $_GET['id_ingrediente'];
        $stockingrediente->cantidad = $_GET['cantidad'];
        $stockingrediente->costo = $_GET['costo'];

        $ingrediente = Ingrediente::find($stockingrediente->ingrediente_id);

        $stockingrediente->unidad = $ingrediente->unidad;

        if ($stockingrediente->unidad == 100) {
            $stockingrediente->costo_u = $stockingrediente->costo * 100 / $stockingrediente->cantidad;
        }else{
            $stockingrediente->costo_u = $stockingrediente->costo / $stockingrediente->cantidad;
        }
/*  Se quita esto para que al grabar el stock no se modifique la unidad del ingrediente INICIO
        if ($stockingrediente->cantidad >= 500) {
            $stockingrediente->unidad = 100;
            $stockingrediente->costo_u = $stockingrediente->costo * 100 / $stockingrediente->cantidad;
        }else{
            $stockingrediente->unidad = 1;
            $stockingrediente->costo_u = $stockingrediente->costo / $stockingrediente->cantidad;
        }
Se quita esto para que al grabar el stock no se modifique la unidad del ingrediente FIN */
        $stockingrediente->save();

        $stock = Stock::find($stockingrediente->stock_id);
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
        $ingrediente_id = $_GET['id_ingrediente'];
        $stock = Stock::find($stock_id);
        $ingrediente = Ingrediente::find($ingrediente_id);

        $html = view('admin.stocks.partials.cargaringredientes')
                  ->with('stock', $stock)
                  ->with('ingrediente',$ingrediente);

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
        $stockingrediente = StockIngrediente::find($id);
        $stockingrediente->delete();

        $stock = Stock::find($stockingrediente->stock_id);
        $stock->load('stockingredientes', 'stockingredientes');

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
