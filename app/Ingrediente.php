<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = "ingredientes";
    protected $fillable = ['nombre','cantidad','stockcritico', 'unidad', 'costo_u', 'max'];

	public function stocksingredientes()
    {
    	return $this->hasMany('App\StockIngrediente');
    }

    public function recetaingredientes()
    {
    	return $this->hasMany('App\RecetaIngrediente');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }


}
