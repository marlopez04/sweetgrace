<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetaInsumo extends Model
{
    protected $table = "recetainsumos";
    protected $fillable = ['receta_id','insumo_id','precio'];

	public function insumo()
    {
    	return $this->belongsTo('App\Insumo');
    }

	public function articulo()
    {
    	return $this->belongsTo('App\Receta');
    }

}
