<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RecetaInsumo;
use App\Receta;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Iluminate\Support\Facedes\Redirect;
use Laracasts\Flash\Flash;

class RecetaInsumosController extends Controller
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
        
        $recetainsumo = new RecetaInsumo();
        $recetainsumo->receta_id = $_GET['id_receta'];
        $recetainsumo->nombre = $_GET['nombre'];
        $recetainsumo->insumo_id = $_GET['id_insumo'];
        $recetainsumo->cantidad = $_GET['cantidad'];
        $recetainsumo->save();

        $receta = Receta::find($recetainsumo->receta_id);
        $recetaid = $receta->id;
//recupero los ingredientes
        $costoingredientes = \DB::select('SELECT rin.receta_id, sum( round((rin.cantidad / ing.unidad) *  ing.costo_u, 2)) as costo
                                FROM recetaingredientes rin
                                INNER JOIN ingredientes ing on ing.id = rin.ingrediente_id
                                WHERE rin.receta_id = "{$recetaid}"
                                GROUP BY rin.receta_id');

//        $costoingredientes = \DB::select($consulta);

//recupero los insumos
        $costoinsumos = \DB::select('SELECT rin.receta_id, sum( round((rin.cantidad / ins.unidad) *  ins.costo_u, 2)) as costo
                                            FROM recetainsumos rin
                                            INNER JOIN insumos ins on ins.id = rin.insumo_id
                                            WHERE rin.receta_id = "{$recetaid}"
                                            GROUP BY rin.receta_id');

//sumno los dos para sacar el costo total y grabarlo en la receta

        $receta->costo = $costoingredientes->costo + $costoinsumos->costo;
        $receta->save();


        $receta->load('recetainsumos', 'recetaingredientes');
        $receta->recetainsumos->load('insumo');
        $receta->recetaingredientes->load('ingrediente');

        $html = view('admin.recetas.partials.insumosingredientes')
                   ->with('receta', $receta);

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
        $recetainsumo = RecetaInsumo::find($id);
        $recetainsumo->delete();

        $receta = Receta::find($recetainsumo->receta_id);

        $recetaid = $receta->id;
//recupero los ingredientes
        $costoingredientes = \DB::select('SELECT rin.receta_id, sum( round((rin.cantidad / ing.unidad) *  ing.costo_u, 2)) as costo
                                FROM recetaingredientes rin
                                INNER JOIN ingredientes ing on ing.id = rin.ingrediente_id
                                WHERE rin.receta_id = "{$recetaid}"
                                GROUP BY rin.receta_id');

//        $costoingredientes = \DB::select($consulta);

//recupero los insumos
        $costoinsumos = \DB::select('SELECT rin.receta_id, sum( round((rin.cantidad / ins.unidad) *  ins.costo_u, 2)) as costo
                                            FROM recetainsumos rin
                                            INNER JOIN insumos ins on ins.id = rin.insumo_id
                                            WHERE rin.receta_id = "{$recetaid}"
                                            GROUP BY rin.receta_id');

//sumno los dos para sacar el costo total y grabarlo en la receta

        $receta->costo = $costoingredientes->costo + $costoinsumos->costo;
        $receta->save();


        $receta->load('recetainsumos', 'recetaingredientes');
        $receta->recetainsumos->load('insumo');
        $receta->recetaingredientes->load('ingrediente');


        $html = view('admin.recetas.partials.insumosingredientes')
                   ->with('receta', $receta);

         return $html;
    }
}
