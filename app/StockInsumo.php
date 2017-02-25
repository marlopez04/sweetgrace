<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockInsumo extends Model
{
    protected $table = "stockinsumos";
    protected $fillable = [' costo','cantidad','insumo_id', 'estado', 'tipo', 'stock_id','unidad','costo_u'];


    public function insumo()
    {
    	return $this->belongsTo('App\Insumo');
    }

    public function stock()
    {
    	return $this->belongsTo('App\Stock');
    }

}
