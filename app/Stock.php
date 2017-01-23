<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stock";
    protected $fillable = ['user_id', 'tipo', 'estado'];

	public function stockingredientes()
    {
    	return $this->hasMany('App\StockIngrediente');
    }

    public function stockinsumo()
    {
    	return $this->hasMany('App\StockInsumo');
    }

        public function users()
    {
    	return $this->belongsTo('App\User');
    }

        public function pedido()
    {
        return $this->hasOne('App\Pedido');
    }

}
