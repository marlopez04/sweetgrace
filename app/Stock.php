<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stock";
    protected $fillable = ['user_id', 'tipo', 'estado', 'costo', 'movimiento_id'];

	public function stockingredientes()
    {
    	return $this->hasMany('App\StockIngrediente');
    }

    public function stockinsumos()
    {
    	return $this->hasMany('App\StockInsumo');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function pedido()
    {
        return $this->hasOne('App\Pedido');
    }

    public function movimiento()
    {
        return $this->belongsTo('App\Movimiento', 'movimiento_id', 'id');
    }

}
