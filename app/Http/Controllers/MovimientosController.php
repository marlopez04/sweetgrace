<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movimiento;
use App\User;
use App\Pedido;
use App\Stock;
use App\Saldo;
use Carbon\Carbon;


class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
// 1° recuperar el ultimo SALDO para controlar con el ultimo 
        $saldo = Saldo::orderBy('id', 'desc')->take(1)->get();
        $sysdate = Carbon::now(); //recupero el sysdate
        
// 2° Controlo el cambio de mes, si es asi, genero el nuevo SALDO
        if($sysdate->format('Ym') > $saldo[0]->periodo){
            //recuperar el ultimo SALDO
            $nuevosaldo = new Saldo();
            $nuevosaldo->periodo = $sysdate->format('Ym');
            $saldo[0]->importe;

            //recuperar todos los movimientos de ese mes
/*
            select DATE_FORMAT(SYSDATE(), '%Y-%m-%d') from movimientos
*/



            //sumar al SALDO, todos los ingresos y restar todos los egresos
            //grabar el nuevo SALDO en la tabla saldos

        }
// 3° Devuelvo el Saldo y los movimientos del mes en curso

//        dd($movimientos[1]);
//        dd($saldo[0]->periodo);
//        dd($tiempo->format('Ym')); //obtengo el periodo del mes
/*
*/
        $movimientos = Movimiento::orderBy('id', 'DECS')->paginate(100);
        $movimientos->load('user');

        return view('admin.movimientos.index')
                ->with('movimientos', $movimientos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movimiento = new Movimiento($request->all());
        $movimiento->user_id = \Auth::user()->id;
        $movimiento->save();

        $movimientos = Movimiento::orderBy('id', 'DECS')->paginate(5);
        $movimientos->load('user', 'stocks', 'pedidos');

        return view('admin.movimientos.index')
                ->with('movimientos', $movimientos);

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
