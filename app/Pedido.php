<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedidos";
    protected $fillable = ['entrega','importe','cliente_id','user_id','estado','stock_id'];

	public function pedidoarticulos()
    {
    	return $this->hasMany('App\PedidoArticulo');
    }

    public function users()
    {
    	return $this->belongsTo('App\User');
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

}
