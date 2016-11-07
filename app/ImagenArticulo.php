<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenArticulo extends Model
{
    protected $table = "imagenesarticulos";
    protected $fillable = ['nombre', 'articulo_id'];

    public function articulo()
    {
    	return $this->belongsTo('App\Articulo');
    }
}
