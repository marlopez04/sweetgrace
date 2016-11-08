<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetaIngrediente extends Model
{
    protected $table = "recetaingredientes";
    protected $fillable = ['receta_id','ingrediente_id','precio'];

	public function ingrediente()
    {
    	return $this->belongsTo('App\Ingrediente');
    }

	public function articulo()
    {
    	return $this->belongsTo('App\Receta');
    }

}
