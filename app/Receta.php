<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = "recetas";
    protected $fillable = ['nombre','costo', 'articulo_id'];

	public function recetaingredientes()
    {
    	return $this->hasMany('App\RecetaIngrediente');
    }

    public function recetainsumos()
    {
        return $this->hasMany('App\RecetaInsumo');
    }

	public function articulo()
    {
    	return $this->belongsTo('App\Articulo');
    }

}
