<?php

namespace App\Http\Controllers;
use App\Stock;
use Illuminate\Http\Request;
use App\StockIngrediente;
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

        if ($stockingrediente->cantidad >= 500) {
            $stockingrediente->unidad = 100;
            $stockingrediente->costo_u = $stockingrediente->costo * 100 / $stockingrediente->cantidad;
        }else{
            $stockingrediente->unidad = 1;
            $stockingrediente->costo_u = $stockingrediente->costo / $stockingrediente->cantidad;
        }

        $stockingrediente->save();

        $stock = Stock::find($stockingrediente->stock_id);
        $stock->load('stockingredientes', 'stockinsumos');

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
        $stockingrediente = StockIngrediente::find($id);
        $stockingrediente->delete();

        $stock = Stock::find($stockingrediente->stock_id);
        $stock->load('stockingredientes', 'stockingredientes');

        $html = view('admin.stocks.partials.insumosingredientes')
                   ->with('stock', $stock);

         return $html;

    }
}
