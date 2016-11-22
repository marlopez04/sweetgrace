<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaPrecio;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use App\Http\Request\ListaPrecioRequest;
use Illuminate\Support\Facades\Redirect;

class ListaPreciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listasprecios = ListaPrecio::orderBy('id', 'DECS')->paginate(5);
        return view('admin.precios.index')->with('listasprecios', $listasprecios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.precios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listaprecio = new ListaPrecio($request->all());
        $listaprecio->save();

        Flash::warning('La lista de precio '. $listaprecio->nombre . ' ha sido creada con exito');
        return redirect()->route('admin.precios.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaprecio = ListaPrecio::find($id);

        return view('admin.precios.edit')->with('listaprecio', $listaprecio);
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
        $listaprecio = ListaPrecio::find($id);
        $listaprecio->fill($request->all());
        $listaprecio->save();

        Flash::warning('La lista de precio'. $listaprecio->nombre . ' ha sido actualizada.');
        return redirect()->route('admin.precios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaprecio = ListaPrecio::find($id);
        $listaprecio->delete();

        Flash::error('La lista '. $listaprecio->nombre . ' ha sido borrada con exito.');
        return redirect()->route('admin.precios.index');
    }
}
