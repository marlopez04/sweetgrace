<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Request\InsumoRequest;
use App\Http\Controllers\Controller;
use App\Insumo;
use App\Receta;
use App\Ingrediente;
use Laracasts\Flash\Flash;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $insumos = Insumo::Search($request->nombre)->orderBy('id', 'DESC')->paginate(12);
        return view('admin.insumos.index')->with('insumos', $insumos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insumos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insumo = new Insumo($request->all());
        $insumo->costo_u = doubleval($request->costo);
        $insumo->max = $request->cantidad;
        $insumo->save();
        
        Flash::warning('El insumo '. $insumo->name . ' ha sido creado con exito');
        return redirect()->route('admin.insumos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $insumos = Insumo::orderBy('id', 'DESC');
        if ($id == "0"){
            $insumos = Insumo::orderBy('id', 'DESC')->paginate(5);    
        }else{
            $insumos = Insumo::Search($id)->orderBy('id', 'DESC')->paginate(5);
        }

        $tipo = $_GET['tipo'];

        if ($tipo == "0"){

            $html = view('admin.recetas.partials.insumo')
            ->with('insumos', $insumos);

            return $html;

        }else{

            $html = view('admin.stocks.partials.insumo')
            ->with('insumos', $insumos);

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
        $insumo = Insumo::find($id);

        return view('admin.insumos.edit')->with('insumo', $insumo);
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
        $insumo = Insumo::find($id);
        $insumo->fill($request->all());
        if ($insumo->max < $request->cantidad) {
            $insumo->max = $request->cantidad;
        }

        if ($insumo->costo_u <> doubleval($request->costo)) {
            //cambio el costo
            $insumo->costo_u = doubleval($request->costo);

        //------ recalcular costo de las recetas

        //obtengo las recetas que poseen ingredientes cargados en el stock

                $recetas = \DB::select("SELECT ris.receta_id as receta_id
                                        FROM recetainsumos ris 
                                        WHERE ris.insumo_id = '{$id}'");

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

        $insumo->save();

        Flash::warning('El insumo '. $insumo->nombre . ' ha sido editado con exito');
        return redirect()->route('admin.insumos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumo = Insumo::find($id);
        $insumo->delete();

        Flash::error('El insumo '. $insumo->nombre . ' ha sido borrado con exito.');
        return redirect()->route('admin.insumos.index');
    }
}
