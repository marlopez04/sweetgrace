<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetaIngrediente extends Model
{
    protected $table = "recetaingredientes";
    protected $fillable = ['receta_id','ingrediente_id', 'nombre', 'cantidad'];

	public function ingrediente()
    {
    	return $this->belongsTo('App\Ingrediente');
    }

    public function receta()
    {
        return $this->belongsTo('App\Receta', 'receta_id', 'id');
    }

}
