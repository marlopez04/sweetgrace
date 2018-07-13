<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\User;
use App\Ingrediente;
use App\Insumo;
use App\Receta;
use App\Movimiento;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
        //1°
        //Creo el movimiento negativo o egreso por que se gasta plata en el stock

        $sysdate = Carbon::now(); //recupero el sysdate
        $periodoactual = $sysdate->format('Ym');

        $movimiento = new Movimiento();
        $movimiento->tipo = 'egreso';
        $movimiento->user_id = \Auth::user()->id;
        $movimiento->importe = 0;
        $movimiento->periodo = $periodoactual;
        $movimiento->relacion = 'stock';
        $movimiento->save();

        //2°
        // Se crea el stock y se relaciona con el movimiento creado
        $stock = new Stock();
        $stock->user_id = \Auth::user()->id;
        $stock->movimiento_id = $movimiento->id;
        $stock->save();

        $movimiento->detalle = 'Egreso por el Stock N° ' . $stock->id;
        $movimiento->save();

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
        $stock->load('stockingredientes', 'stockingredientes', 'pedido');
        $ingredientes = Ingrediente::all();
        $insumos = Insumo::all();

        $html = view('admin.stocks.partials.insumosingredientes')
                     ->with('stock', $stock)
                     ->with('ingredientes', $ingredientes)
                     ->with('insumos', $insumos);

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
        $stock->load('stockingredientes', 'stockinsumos');

        $movimiento = Movimiento::find($stock->movimiento_id);
        $movimiento->importe = $stock->costo;
        if ($movimiento->importe == 0){
            $movimiento->estado = 'pendiente';            
        }else{
            $movimiento->estado = 'confirmado';
        }
        $movimiento->save();


//cargo los ingredientes/insumos del stock y actualizo los costos y cantidades
        foreach ($stock->stockingredientes as $stockingrediente) {

            $ingrediente = Ingrediente::find($stockingrediente->ingrediente_id);

            if ($stockingrediente->tipo == 'ingreso'){
                $ingrediente->cantidad = $ingrediente->cantidad + $stockingrediente->cantidad;
                if($stockingrediente->costo_u <> 0 ){
                    $ingrediente->costo_u = $stockingrediente->costo_u;
                    /*
                    $ingrediente->unidad = $stockingrediente->unidad;
                    */
                }
            }else{
                $ingrediente->cantidad = $ingrediente->cantidad - $stockingrediente->cantidad;
            }

            //compara la nueva cantidad para renovar o no el maximo de ingredientes
            if ($ingrediente->max < $ingrediente->cantidad ){
                $ingrediente->max = $ingrediente->cantidad;
            }

            $ingrediente->save();
        }

        foreach ($stock->stockinsumos as $stockinsumo) {

            $insumo = Insumo::find($stockinsumo->insumo_id);

            if ($stockinsumo->tipo == 'ingreso'){
                $insumo->cantidad = $insumo->cantidad + $stockinsumo->cantidad;
                if($stockinsumo->costo_u <> 0){
                    $insumo->costo_u = $stockinsumo->costo_u;
                    /*
                    $insumo->unidad = $stockinsumo->unidad;
                    */
                }
            }else{
                $insumo->cantidad = $insumo->cantidad - $stockinsumo->cantidad;
            }

            //compara la nueva cantidad para renovar o no el maximo de insumos
            if ($insumo->max < $insumo->cantidad ){
                $insumo->max = $insumo->cantidad;
            }

            $insumo->save();

        }

//------ recalcular costo de las recetas

//obtengo las recetas que poseen ingredientes cargados en el stock

        $recetas = \DB::select("SELECT rin.receta_id as receta_id
                                FROM recetaingredientes rin 
                                WHERE rin.ingrediente_id IN 
                                ( SELECT stockingredientes.ingrediente_id 
                                 FROM stock s 
                                 INNER JOIN stockingredientes on stockingredientes.stock_id = s.id
                                 WHERE s.id = '{$id}')
                                GROUP BY rin.receta_id");

        foreach ($recetas as $recetaid){

            $receta = Receta::find($recetaid->receta_id);
//recupero los ingredientes
            $costoingredientes = \DB::select("SELECT rin.receta_id, sum( round((rin.cantidad / ing.unidad) *  ing.costo_u, 2)) as costo
                                FROM recetaingredientes rin
                                INNER JOIN ingredientes ing on ing.id = rin.ingrediente_id
                                WHERE rin.receta_id = '{$recetaid->receta_id}'
                                GROUP BY rin.receta_id");

//recupero los insumos
            $costoinsumos = \DB::select("SELECT rin.receta_id, sum( round((rin.cantidad / ins.unidad) *  ins.costo_u, 2)) as costo
                                            FROM recetainsumos rin
                                            INNER JOIN insumos ins on ins.id = rin.insumo_id
                                            WHERE rin.receta_id = '{$recetaid->receta_id}'
                                            GROUP BY rin.receta_id");

//sumno los dos para sacar el costo total y grabarlo en la receta
//dd($costoinsumos[0]->costo);

            $receta->costo = $costoingredientes[0]->costo + $costoinsumos[0]->costo;
            $receta->save();
        }

        $recetas = \DB::select("SELECT rin.receta_id as receta_id
                                FROM recetainsumos rin 
                                WHERE rin.insumo_id IN 
                                ( SELECT stockinsumos.insumo_id 
                                 FROM stock s 
                                 INNER JOIN stockinsumos on stockinsumos.stock_id = s.id
                                 WHERE s.id = '{$id}')
                                GROUP BY rin.receta_id");

        foreach ($recetas as $recetaid){
            $receta = Receta::find($recetaid->receta_id);
//recupero los ingredientes
            $costoingredientes = \DB::select("SELECT rin.receta_id, sum( round((rin.cantidad / ing.unidad) *  ing.costo_u, 2)) as costo
                                FROM recetaingredientes rin
                                INNER JOIN ingredientes ing on ing.id = rin.ingrediente_id
                                WHERE rin.receta_id = '{$recetaid->receta_id}'
                                GROUP BY rin.receta_id");


//recupero los insumos
            $costoinsumos = \DB::select("SELECT rin.receta_id, sum( round((rin.cantidad / ins.unidad) *  ins.costo_u, 2)) as costo
                                            FROM recetainsumos rin
                                            INNER JOIN insumos ins on ins.id = rin.insumo_id
                                            WHERE rin.receta_id = '{$recetaid->receta_id}'
                                            GROUP BY rin.receta_id");

//sumno los dos para sacar el costo total y grabarlo en la receta

            $receta->costo = $costoingredientes[0]->costo + $costoinsumos[0]->costo;
            $receta->save();
        }

        $stock->estado = 'confirmado';
        $stock->save();


        return view('admin.stocks.edit')
            ->with('stock', $stock);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imprimir($id)
    {
        $insumos = Insumo::all();
        $ingredientes = Ingrediente::all();
        
        $sysdate = Carbon::now(); //recupero el sysdate
        $periodoactual = $sysdate->format('d/m/Y');


             $html = view('admin.stocks.partials.imprimir')
                   ->with('insumos', $insumos)
                   ->with('ingredientes', $ingredientes)
                   ->with('periodoactual', $periodoactual);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHTML($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();

        $archivos_dir = public_path() . "/archivos/";
        $pdf_file = 'Stocks_'.date('Y-m-d_His') .'.pdf';

        if(!is_dir($archivos_dir))
        {
            mkdir($archivos_dir);
        }

        $pdf_files = array_diff( scandir($archivos_dir), array('.','..') );
        if($pdf_files)
        {
            foreach ($pdf_files as $file)
            {
                if(preg_match("#\.pdf#", $file))
                {
                    @ unlink($archivos_dir . $file);
                }
            }
        }

        file_put_contents($archivos_dir . $pdf_file,$output);

        echo url("/archivos/{$pdf_file}");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $movimiento = Movimiento::find($stock->movimiento_id);
        $stock->delete();
        $movimiento->delete();

        return redirect()->route('admin.stocks.index', $id);
    }
}
