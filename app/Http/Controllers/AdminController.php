<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Insumo;
use App\Ingrediente;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*
        $pedidos = Pedido::all();
        $saldo = Saldo::orderBy('id', 'desc')->take(1)->get();
*/
        $pedidos = Pedido::where('estado', '!=','entregado')
                                ->orderBy('id', 'desc')->get();
        $pedidos->load('cliente');
        $pedidos->load('user');
        $pedidos->load('cobranzas');

        $sysdate = Carbon::now(); //recupero el sysdate
        $periodoactual = $sysdate->format('d/m/Y');

/*
        $insumos = Insumo::all();
        $ingredientes = Ingrediente::all();

        $insumos = Insumo::where('cantidad','<','stockcritico')->get();

        $insumos = \DB::table('insumos')->where('cantidad',"<", 'stockcritico')->get();

*/
        $insumos = \DB::select("SELECT * FROM insumos WHERE cantidad <= stockcritico");

        $ingredientes = \DB::select("SELECT * FROM ingredientes WHERE cantidad <= stockcritico");


        return view('admin.index')
            ->with('pedidos', $pedidos)
            ->with('insumos', $insumos)
            ->with('ingredientes', $ingredientes)
            ->with('sysdate', $sysdate);
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
