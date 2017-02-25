<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = "insumos";
    protected $fillable = ['nombre','cantidad','stockcritico', 'unidad', 'costo_u'];

	public function stocksinsumos()
    {
    	return $this->hasMany('App\StockIngrediente');
    }

    public function recetainsumos()
    {
    	return $this->hasMany('App\RecetaInsumo');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }


}
