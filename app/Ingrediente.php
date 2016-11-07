<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = "ingredientes";
    protected $fillable = ['nombre',' costo','cantidad','stockcritico'];

	public function stocksingredientes()
    {
    	return $this->hasMany('App\StockIngrediente');
    }

}
