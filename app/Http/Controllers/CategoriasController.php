<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categoria;
use App\ListaPrecio;
use App\Articulo;
use Laracasts\Flash\Flash;
use App\Http\Request\CategoriaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Connection;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categorias = Categoria::all();
        //$categorias = Categoria::all()->sortBy("id")->paginate(3);
  
        $categorias = Categoria::orderBy('id', 'DESC')->paginate(8);
        
        //$categorias->each(function($categorias){
        //    $categorias->imagenescategorias;
        //});

//        dd($categorias);

        return view('admin.categorias.index')
            ->with('categorias', $categorias);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
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
            $nombre = 'categoria_' . time() .'.' . $file->getClientOriginalExtension();
            $path = public_path() . '/imagenes/categorias/';
            $file->move($path, $nombre);     
        }

        $categoria = new Categoria($request->all());
        $categoria->imagen = $nombre;
        $categoria->save();
        
        Flash::success('La Categoria '.$categoria->nombre.' ha sido creada con exito');
        return redirect()->route('admin.categorias.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
// agrego una variable para saber de donde proviene la peticion
// "tipo" me define si tiene que devolver para (pedido.create = 1, articulos.index = 2)
        $tipo = $_GET['tipo'];

        $id_lista = $_GET['lista_id'];
        $id_categoria = $id;

        $listaprecio = ListaPrecio::find($id_lista);

        $articulos = Articulo::where('lista_precio_id',$id_lista)
                              ->where('categoria_id',$id_categoria)->get();

        $articulos->load('listaprecio', 'receta', 'categoria');

        $categoria = Categoria::find($id);

        if($tipo == 1){
            $html = view('admin.pedidos.partials.articulos')
                ->with('articulos', $articulos)
                ->with('categoria', $categoria);
        }else{
            $html = view('admin.articulos.partials.articulos')
                ->with('articulos', $articulos)
                ->with('categoria', $categoria);
        }


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
        $categoria = Categoria::find($id);

        return view('admin.categorias.edit')
            ->with('categoria', $categoria);
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

        $categoria = Categoria::find($id);

        if ($request->file('imagen'))
        {
            $path = public_path() . '/imagenes/categorias/';
            unlink($path . $categoria->imagen);

            $file = $request->file('imagen');
            $nombre = 'categoria_' . time() .'.' . $file->getClientOriginalExtension();
            $file->move($path, $nombre);     
            $categoria->imagen = $nombre;
        }

        $categoria->fill($request->all());
        $categoria->save();

        return redirect()->route('admin.categorias.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $path = public_path() . '/imagenes/categorias/';
        unlink($path . $categoria->imagen);
        $categoria->delete();

        Flash::error('se ha borrado la categoria '. $categoria->nombre .' de forma exitosa!');
        return redirect()->route('admin.categorias.index');

    }

}
