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
        $periodoactual = $sysdate->format('Ym');

// 2° Controlo el cambio de mes, si es asi, genero el nuevo SALDO
        if($periodoactual > $saldo[0]->periodo){
            //genero un nuevo saldo
            $nuevosaldo = new Saldo();
            $nuevosaldo->periodo = $periodoactual;
            $saldo[0]->importe;
            $periodosaldo = $saldo[0]->periodo;
            $ingresos = 0;
            $egresos = 0;

            //recuperar todos los movimientos de ese mes
            $movimientosanteriores = \DB::select("SELECT * FROM movimientos WHERE periodo = '{$periodosaldo}'");

            //sumar al SALDO, todos los ingresos y restar todos los egresos
            foreach($movimientosanteriores as $movimiento){
                if($movimiento->tipo == 'ingreso'){
                    $ingresos = $ingresos + $movimiento->importe;
                }else{
                    $egresos = $egresos + $movimiento->importe;
                }
            }
            $nuevosaldo->importe = $saldo[0]->importe + $ingresos - $egresos;
            //grabar el nuevo SALDO en la tabla saldos

            $nuevosaldo->save();

            $saldo = Saldo::orderBy('id', 'desc')->take(1)->get();

        }
// 3° Devuelvo el Saldo y los movimientos del mes en curso

//        dd($movimientos[1]);
//        dd($saldo[0]->periodo);
//        dd($tiempo->format('Ym')); //obtengo el periodo del mes
/*

        $movimientos = \DB::select("SELECT * 
                                    FROM movimientos
                                    WHERE DATE_FORMAT(created_at, '%Y%m') = '{$periodoactual}'");

        $movimientos = Movimiento::Where('created_at', 'LIKE','%2015-05%')->get();
*/

/*
//prueba 4 inicio
    $from = date('2017-04-01 ' . '00:00:00');
    $to = date('2017-05-31 ' . '00:00:00');

    $movimientos = Movimiento::whereBetween('created_at', array($from, $to))->get();
    $movimientos->load('user');
//prueba 4 fin
*/

//prueba 5 inicio
    $from = '201701';
    $to = '201701';

    $movimientos = Movimiento::whereBetween('periodo', array($from, $to))->get();
    $movimientos->load('user');
//prueba 5 fin

    $saldoactual = $saldo[0]->importe;

    $saldos = Saldo::orderBy('id', 'DECS')->lists('periodo', 'id');

//dd($movimientos);

//        $movimientos = Movimiento::orderBy('id', 'DECS')->paginate(100);

        return view('admin.movimientos.index')
                ->with('movimientos', $movimientos)
                ->with('saldoactual', $saldoactual)
                ->with('saldos', $saldos);
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
        $sysdate = Carbon::now(); //recupero el sysdate
        $periodoactual = $sysdate->format('Ym');

        $movimiento = new Movimiento($request->all());
        $movimiento->user_id = \Auth::user()->id;
        $movimiento->periodo = $periodoactual;
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
