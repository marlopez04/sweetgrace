<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{


    protected $table = "articulos";
    protected $fillable = ['nombre','descripcion','precio','lista_precio_id','user_id','categoria_id', 'imagen', 'receta_id'];

    public function receta()
    {
    	return $this->belongsTo('App\Receta', 'receta_id', 'id');
    }

    public function listaprecio()
    {
        return $this->belongsTo('App\ListaPrecio', 'lista_precio_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
    }

    public function pedidoarticulo()
    {
        return $this->hasMany('App\PedidoArticulo');
    }
}
