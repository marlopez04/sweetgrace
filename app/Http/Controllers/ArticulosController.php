<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Articulo;
use App\ListaPrecio;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::orderBy('id', 'DESC')->paginate(8);
        $articulos->each(function($articulos){
            $articulos->categoria;
            $articulos->listaprecio;
        });

        dd($articulos);
//        return view('admin.articulos.index')
//            ->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $listasprecios = ListaPrecio::orderBy('id', 'DECS')->lists('nombre', 'id');

        return view('admin.articulos.create')
            ->with('categorias', $categorias)
            ->with('listasprecios', $listasprecios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->file('imagen'))
        {
            $file = $request->file('imagen');
            $nombre = 'articulo_' . time() .'.' . $file->getClientOriginalExtension();
            $path = public_path() . '/imagenes/articulos/';
            $file->move($path, $nombre);     
        }            

        $articulo = new Articulo($request->all());
        $articulo->user_id = \Auth::user()->id;
        $articulo->imagen = $nombre;
        $articulo->save();

        Flash::success('Se ha creado el articulo '. $articulo->nombre . ' de forma satisfactoria!');

        return redirect()->route('admin.articles.index');
          
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
        //
    }
}
