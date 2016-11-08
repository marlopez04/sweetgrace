<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockIngrediente extends Model
{
    protected $table = "stockingredientes";
    protected $fillable = [' costo','cantidad','ingrediente_id', 'estado', 'tipo'];


    public function ingrediente()
    {
    	return $this->belongsTo('App\Ingrediente');
    }

    public function stock()
    {
    	return $this->belongsTo('App\Stock');
    }


}
