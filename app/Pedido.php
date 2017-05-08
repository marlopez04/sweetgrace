<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedidos";
    protected $fillable = ['entrega','importe','cliente_id','user_id','estado','movimiento_id','stock_id'];

	public function pedidoarticulos()
    {
    	return $this->hasMany('App\PedidoArticulo');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }

    public function stock()
    {
    	return $this->belongsTo('App\Stock');
    }

    public function cobranzas()
    {
    	return $this->hasMany('App\Cobranza');
    }

    public function movimiento()
    {
        return $this->belongsTo('App\Movimiento', 'movimiento_id', 'id');
    }


}
