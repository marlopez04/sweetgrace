<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = "recetas";
    protected $fillable = ['nombre','costo'];

	public function recetaingredientes()
    {
    	return $this->hasMany('App\RecetaIngrediente');
    }

    public function recetainsumos()
    {
        return $this->hasMany('App\RecetaInsumo');
    }

	public function articulos()
    {
    	return $this->hasMany('App\Articulo');
    }

}
