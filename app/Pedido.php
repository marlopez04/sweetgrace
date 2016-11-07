<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedidos";
    protected $fillable = ['nombre',' costo','cantidad','stockcritico'];

	public function articulos()
    {
    	return $this->hasMany('App\Articulo');
    }

}
