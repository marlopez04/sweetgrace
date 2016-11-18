<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{


	protected $table = "categorias";
    protected $fillable = ['nombre'];

	public function imagenescategorias()
    {
    	return $this->hasMany('App\ImagenCategoria');
    }

    public function articulos()
    {
    	return $this->hasMany('App\Articulo');
    }
}
