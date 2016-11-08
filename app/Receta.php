<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = "recetas";
    protected $fillable = ['nombre','costo'];

	public function recetaingrediente()
    {
    	return $this->hasMany('App\RecetaIngrediente');
    }

	public function articulo()
    {
    	return $this->belongsTo('App\Articulo');
    }

}
