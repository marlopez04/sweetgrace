<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{


    protected $table = "articulos";
    protected $fillable = ['nombre','descripcion','precio','receta_id','lista_id','user_id','categoria_id'];

    public function recetas()
    {
    	return $this->belongsTo('App\Receta');
    }

    public function listaprecios()
    {
    	return $this->belongsTo('App\ListaPrecios');
    }

    public function users()
    {
    	return $this->belongsTo('App\User');
    }

    public function categorias()
    {
    	return $this->belongsTo('App\Categoria');
    }

	public function images()
    {
    	return $this->hasMany('App\ImagenesArticulos');
    }

    public function pedidoarticulo()
    {
        return $this->hasMany('App\PedidoArticulo');
    }
}
