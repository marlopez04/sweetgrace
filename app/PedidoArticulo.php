<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoArticulo extends Model
{
 	protected $table = "pedidoarticulos";
    protected $fillable = ['pedido_id','articulo_id','cantidad','precio'];

    public function pedido()
    {
    	return $this->belongsTo('App\Pedido');
    }

    public function articulo()
    {
    	return $this->belongsTo('App\Articulo');
    }
    
}
