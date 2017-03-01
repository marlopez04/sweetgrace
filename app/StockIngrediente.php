<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockIngrediente extends Model
{
    protected $table = "stockingredientes";
    protected $fillable = [' costo','cantidad','nombre', 'ingrediente_id', 'tipo', 'stock_id', 'unidad', 'costo_u'];


    public function ingrediente()
    {
    	return $this->belongsTo('App\Ingrediente');
    }

    public function stock()
    {
    	return $this->belongsTo('App\Stock');
    }


}
