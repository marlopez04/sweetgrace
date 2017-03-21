<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RecetaInsumo;
use App\Receta;
use App\Insumo;
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

    public function mostrar($id)
    {
        $receta_id = $_GET['id_receta'];
        $insumo_id = $_GET['id_insumo'];
        $receta = Receta::find($receta_id);
        $insumo = Insumo::find($insumo_id);

        $html = view('admin.recetas.partials.cargarinsumos')
                  ->with('receta', $receta)
                  ->with('insumo',$insumo);

        return $html;

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
        $receta->load('recetaingredientes', 'recetainsumos');
        
        $receta->recetainsumos->load('insumo');
        $receta->recetaingredientes->load('ingrediente');
        $recetaid = $receta->id;
        $costoingredientes = 0;
        $costoinsumos = 0;

        foreach($receta->recetaingredientes as $recetaingrediente){
            $costoingredientes += ($recetaingrediente->cantidad/$recetaingrediente->ingrediente->unidad) * $recetaingrediente->ingrediente->costo_u;

        }
        foreach($receta->recetainsumos as $recetainsumo){
            $costoinsumos += ($recetainsumo->cantidad/$recetainsumo->insumo->unidad) * $recetainsumo->insumo->costo_u;

        }

        $recetaid = $receta->id;

        $receta->costo = $costoingredientes + $costoinsumos;
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
        $receta->load('recetaingredientes', 'recetainsumos');

        $receta->recetainsumos->load('insumo');
        $receta->recetaingredientes->load('ingrediente');
        $recetaid = $receta->id;
        $costoingredientes = 0;
        $costoinsumos = 0;

        foreach($receta->recetaingredientes as $recetaingrediente){
            $costoingredientes += ($recetaingrediente->cantidad/$recetaingrediente->ingrediente->unidad) * $recetaingrediente->ingrediente->costo_u;

        }
        foreach($receta->recetainsumos as $recetainsumo){
            $costoinsumos += ($recetainsumo->cantidad/$recetainsumo->insumo->unidad) * $recetainsumo->insumo->costo_u;

        }

        $receta->costo = $costoingredientes + $costoinsumos;
        $receta->save();

        $html = view('admin.recetas.partials.insumosingredientes')
                   ->with('receta', $receta);

         return $html;
    }
}
