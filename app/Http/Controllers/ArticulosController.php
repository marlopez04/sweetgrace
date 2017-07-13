<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Articulo;
use App\Receta;
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
        $categorias = Categoria::all();
        $listasprecios = ListaPrecio::orderBy('id', 'DECS')->lists('nombre', 'id');

//        $articulos = Articulo::all();
        $articulos->load('categoria', 'user', 'listaprecio', 'receta');
/*        
        $articulos->each(function($articulos){
            $articulos->categoria;
            $articulos->listaprecio;
            $articulos->user;
        });
*/
//        dd($articulos);
        return view('admin.articulos.index')
            ->with('articulos', $articulos)
            ->with('listasprecios', $listasprecios)
            ->with('categorias', $categorias);
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

        $receta = new Receta();
        $receta->save();

        return view('admin.articulos.create')
            ->with('categorias', $categorias)
            ->with('receta', $receta)
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

        $receta = Receta::find($request->receta_id);
        $receta->nombre = $request->nombre;
        $receta->costo = '0';
        $receta->save();

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

        $id = $receta->id;

        Flash::success('Se ha creado el articulo '. $receta->nombre . ' de forma satisfactoria!');

        return redirect()->route('admin.recetas.edit', $id);

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
        $articulo = Articulo::find($id);
        $articulo->load('categoria', 'user', 'listaprecio');
        $categorias = Categoria::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $listasprecios = ListaPrecio::orderBy('id', 'DECS')->lists('nombre', 'id');

        return view('admin.articulos.edit')
            ->with('articulo', $articulo)
            ->with('categorias', $categorias)
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
        $articulo = Articulo::find($id);

        if ($request->file('imagen'))
        {
            $path = public_path() . '/imagenes/articulos/';
            unlink($path . $articulo->imagen);

            $file = $request->file('imagen');
            $nombre = 'articulo_' . time() .'.' . $file->getClientOriginalExtension();
            $file->move($path, $nombre);     
        }

        $articulo->fill($request->all());
        $articulo->imagen = $nombre;
        $articulo->save();

        return redirect()->route('admin.articulos.index');
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
