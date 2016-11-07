<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenCategoria extends Model
{
	protected $table = "ImagenesCategorias";
    protected $fillable = ['nombre', 'categoria_id'];

    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
    }
}
