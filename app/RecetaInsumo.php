<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetaInsumo extends Model
{
    protected $table = "recetainsumos";
    protected $fillable = ['receta_id','insumo_id', 'nombre','cantidad'];

	public function insumo()
    {
    	return $this->belongsTo('App\Insumo');
    }

    public function receta()
    {
        return $this->belongsTo('App\Receta', 'receta_id', 'id');
    }

}
