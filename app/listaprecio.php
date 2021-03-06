<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaPrecio extends Model
{
	protected $table = "listaprecios";
	protected $fillable = ['nombre', 'vigencia_desde', 'vigencia_hasta'];

    public function articulos()
    {
    	return $this->hasMany('App\Articulo');
    }
}
