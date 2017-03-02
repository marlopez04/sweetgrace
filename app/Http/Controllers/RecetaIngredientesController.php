<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecetaIngrediente;
use App\Receta;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Iluminate\Support\Facedes\Redirect;
use Laracasts\Flash\Flash;

class RecetaIngredientesController extends Controller
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
        $recetaingrediente = new RecetaIngrediente();
        $recetaingrediente->receta_id = $_GET['id_receta'];
        $recetaingrediente->nombre = $_GET['nombre'];
        $recetaingrediente->ingrediente_id = $_GET['id_ingrediente'];
        $recetaingrediente->cantidad = $_GET['cantidad'];
        $recetaingrediente->costo = $_GET['cantidad'];
        $recetaingrediente->save();

        $receta = Receta::find($recetaingrediente->receta_id);
        $receta->load('recetaingredientes', 'recetainsumos');

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
        $recetaingrediente = RecetaIngrediente::find($id);
        $recetaingrediente->delete();

        $receta = Receta::find($recetaingrediente->receta_id);
        $receta->load('recetaingredientes', 'recetaingredientes');

        $html = view('admin.recetas.partials.insumosingredientes')
                   ->with('receta', $receta);

         return $html;

    }
}
