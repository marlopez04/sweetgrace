<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaPrecio;
use App\Articulo;
use App\Receta;
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

        $listaprecios = ListaPrecio::find($id);
        $listaprecios->load('articulos');
        $listaprecios->articulos->load('receta');

        $tipo = $_GET['tipo'];
        $porcentaje = $_GET['porcentaje'];

/*
        $tipo = 1;
        $porcentaje = 10;
*/

        if ($tipo == 1) {
            //trae lista vieja
            //con un select que traiga articulos con sus costos de cada receta

             $html = view('admin.precios.partials.listavieja')
                   ->with('listaprecios', $listaprecios);

             return $html;
        }else{
            //trae lista nueva con porcentaje
            //con un select que traiga articulos con sus costos de cada receta + el porcentaje de aumento en el precio
            foreach($listaprecios->articulos as $articulo){

                $articulo->precio = $articulo->precio * (($porcentaje / 100) + 1);

            }

            $html = view('admin.precios.partials.listanueva')
                   ->with('listaprecios', $listaprecios);

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
        $listaprecio = ListaPrecio::find($id);
        $listasprecios = ListaPrecio::orderBy('id', 'DECS')->lists('nombre', 'id');

        return view('admin.precios.edit')
            ->with('listaprecio', $listaprecio)
            ->with('listasprecios', $listasprecios);
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
