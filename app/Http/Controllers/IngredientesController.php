<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\InsumoRequest;
use App\Http\Requests;
use App\Ingrediente;
use App\Receta;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ingredientes = Ingrediente::Search($request->nombre)->orderBy('id', 'DESC')->paginate(12);
        return view('admin.ingredientes.index')->with('ingredientes', $ingredientes);
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
        $ingrediente->costo_u = doubleval($request->costo);
        $ingrediente->max = $request->cantidad;
        $ingrediente->save();
        
        Flash::warning('El ingrediente '. $ingrediente->nombre . ' ha sido creado con exito');
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
        
        if ($id == "0"){
            $ingredientes = Ingrediente::orderBy('id', 'DESC')->paginate(5);
        }else{
            $ingredientes = Ingrediente::Search($id)->orderBy('id', 'DESC')->paginate(5);
        }

        $tipo = $_GET['tipo'];

//recupera el tipo ( 0 = receta , 1 stock) para saber a donde enviar los datos y que vista usar

        if ($tipo == "0"){

            $html = view('admin.recetas.partials.ingrediente')
                ->with('ingredientes', $ingredientes);

                return $html;

        }else{

            $html = view('admin.stocks.partials.ingrediente')
                ->with('ingredientes', $ingredientes);

                return $html;

        }
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingrediente = Ingrediente::find($id);

        return view('admin.ingredientes.edit')->with('ingrediente', $ingrediente);
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
        $ingrediente = Ingrediente::find($id);
        $ingrediente->fill($request->all());
        if ($ingrediente->max < $request->cantidad) {
            $ingrediente->max = $request->cantidad;
        }
        if ($ingrediente->costo_u <> doubleval($request->costo)) {
            //cambio el costo
            $ingrediente->costo_u = doubleval($request->costo);

        //------ recalcular costo de las recetas

        //obtengo las recetas que poseen ingredientes cargados en el stock

                $recetas = \DB::select("SELECT rin.receta_id as receta_id
                                        FROM recetaingredientes rin 
                                        WHERE rin.ingrediente_id = '{$id}'");

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

        }

        $ingrediente->save();



        Flash::warning('El ingrediente '. $ingrediente->nombre . ' ha sido editado con exito');
        return redirect()->route('admin.ingredientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingrediente = Ingrediente::find($id);
        $ingrediente->delete();

        Flash::error('El ingrediente '. $ingrediente->nombre . ' ha sido borrado con exito.');
        return redirect()->route('admin.ingredientes.index');
    }
}
