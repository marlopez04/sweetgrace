<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = "insumos";
    protected $fillable = ['nombre','costo','cantidad','stockcritico'];

	public function stocksinsumos()
    {
    	return $this->hasMany('App\StockIngrediente');
    }

    public function recetainsumos()
    {
    	return $this->hasMany('App\RecetaInsumo');
    }

}
