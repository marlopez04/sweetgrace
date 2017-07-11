<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Request\InsumoRequest;
use App\Http\Controllers\Controller;
use App\Insumo;
use Laracasts\Flash\Flash;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::orderBy('id', 'DESC')->paginate(12);
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
