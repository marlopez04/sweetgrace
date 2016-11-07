<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{


	protected $table = "categorias";
    protected $fillable = ['nombre'];

	public function images()
    {
    	return $this->hasMany('App\ImagenesCategorias');
    }

    public function articulos()
    {
    	return $this->hasMany('App\Articulo');
    }
}
