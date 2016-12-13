<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\InsumoRequest;
use App\Http\Requests;
use App\Ingrediente;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientes = Ingrediente::orderBy('id', 'DESC')->paginate(5);
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

        $html = view('admin.recetas.partials.ingrediente')
            ->with('ingredientes', $ingredientes);

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
