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
use Barryvdh\DomPDF\Facade;

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


        $id_lista_actual = $_GET['lista_id'];
        $tipo = $_GET['tipo'];
        $porcentaje = $_GET['porcentaje'];
/*

        $tipo = 1;
        $porcentaje = 10;
*/


        switch($tipo){
            case '1';
            
                $html = view('admin.precios.partials.listavieja')
                   ->with('listaprecios', $listaprecios);

                 return $html;

            break;
            
            case '2';
                foreach($listaprecios->articulos as $articulo){

                    $articulo->precio = $articulo->precio * (($porcentaje / 100) + 1);

                }

                $html = view('admin.precios.partials.listanueva')
                       ->with('listaprecios', $listaprecios);

                 return $html;

                break;

            case '3';
                foreach($listaprecios->articulos as $articulo){

                    $articulonuevo = new Articulo();
                    $articulonuevo->nombre = $articulo->nombre;
                    $articulonuevo->descripcion = $articulo->descripcion;
                    $articulonuevo->precio = $articulo->precio * (($porcentaje / 100) + 1);
                    $articulonuevo->lista_precio_id = $id_lista_actual;
                    $articulonuevo->user_id = \Auth::user()->id;
                    $articulonuevo->categoria_id = $articulo->categoria_id;
                    $articulonuevo->imagen = $articulo->imagen;
                    $articulonuevo->receta_id = $articulo->receta_id;

                    $articulonuevo->save();
                }

                $listaconfirmada = ListaPrecio::find($id_lista_actual);
                $listaconfirmada->load('articulos');
                $listaconfirmada->articulos->load('receta');

                $html2 = view('admin.precios.partials.listaconfirmada')
                       ->with('listaconfirmada', $listaconfirmada);

                 return $html2;

            break;
       }

/*

        if ($tipo == 1) 
        {
            //trae lista vieja
            //con un select que traiga articulos con sus costos de cada receta

             $html = view('admin.precios.partials.listavieja')
                   ->with('listaprecios', $listaprecios);

             return $html;
        }
        else
        {
            //trae lista nueva con porcentaje
            //con un select que traiga articulos con sus costos de cada receta + el porcentaje de aumento en el precio
            foreach($listaprecios->articulos as $articulo){

                $articulo->precio = $articulo->precio * (($porcentaje / 100) + 1);

            }

            $html = view('admin.precios.partials.listanueva')
                   ->with('listaprecios', $listaprecios);

             return $html;
        }
*/

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
        $listaprecio->load('articulos');
        $listaprecio->articulos->load('receta');


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

    public function imprimir($id)
    {
        $listaprecios = ListaPrecio::find($id);
        $listaprecios->load('articulos');
        $listaprecios->articulos->load('receta');

        //var_export($_REQUEST);

        $tipo = $_GET['tipo'];
        $porcentaje = $_GET['porcentaje'];

        if ($tipo == 1) {
// Opcion (1) La lista de precio sin modificaciones
            
            //trae lista vieja
            //con un select que traiga articulos con sus costos de cada receta

             $html = view('admin.precios.partials.imprimir')
                   ->with('listaprecios', $listaprecios);

        }else{
// Opcion (2) La lista con el porcentaje de aumento indicado

            $listaprecios->nombre = $listaprecios->nombre . " con " . $porcentaje  . "% +";
            //trae lista nueva con porcentaje
            //con un select que traiga articulos con sus costos de cada receta + el porcentaje de aumento en el precio
            foreach($listaprecios->articulos as $articulo){

                $articulo->precio = $articulo->precio * (($porcentaje / 100) + 1);

            }

            $html = view('admin.precios.partials.imprimir')
                   ->with('listaprecios', $listaprecios);

        }

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHTML($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();

        $archivos_dir = public_path() . "/archivos/";
        $pdf_file = 'lista-precio_'.date('Y-m-d_His') .'.pdf';

        if(!is_dir($archivos_dir))
        {
            mkdir($archivos_dir);
        }

        $pdf_files = array_diff( scandir($archivos_dir), array('.','..') );
        if($pdf_files)
        {
            foreach ($pdf_files as $file)
            {
                if(preg_match("#\.pdf#", $file))
                {
                    @ unlink($archivos_dir . $file);
                }
            }
        }

        file_put_contents($archivos_dir . $pdf_file,$output);

        echo url("/archivos/{$pdf_file}");

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
