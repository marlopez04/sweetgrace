<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Pedido;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Carbon\Carbon;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id','ASC')->paginate(5);
        return view('admin.clientes.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente($request->all());
        $cliente -> save();

        Flash::success("Se ha registrado " . $cliente->nombre. " de forma exitosa.");
        return redirect()->route('admin.clientes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sysdate = Carbon::now(); //recupero el sysdate
        $periodoactual = $sysdate->format('Ym');

        $cliente = Cliente::find($id);
        $cliente->load('pedidos');
        $pedidos = Pedido::where('cliente_id', $cliente->id)->orderBy('id','DSC')->paginate(5);
        $pedidos->load('cobranzas');

// calculo de deuda del cliente INICIO
        foreach($pedidos as $pedido){

        }

// calculo de deuda del cliente FIN

        return view('admin.clientes.show')
                    ->with('cliente', $cliente)
                    ->with('pedidos', $pedidos)
                    ->with('sysdate', $sysdate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.edit')->with('cliente', $cliente);
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
       $cliente = Cliente::find($id);

        //esta linea de abajo reemplaza
        $cliente ->fill($request->all());
        /* todo lo que yo tengo escrito en comentarios
            es una manera mas sencilla de tomar todo lo que trae
            el request y ponerlo en el objeto user, para luego ser
            guardado en la tabla
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        */
        $cliente->save();

        Flash::warning('El usuario '.$cliente->nombre.' ha sido editado con exito');
        return redirect()->route('admin.clientes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        Flash::error('El usuario '. $cliente->nombre .' a sido borrado de forma exitosa');
        return redirect()->route('admin.clientes.index');
    }
}
