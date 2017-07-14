<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = "movimientos";
    protected $fillable = ['detalle','importe','user_id','tipo','estado', 'periodo', 'relacion'];

	public function cobranzas()
    {
    	return $this->hasOne('App\Cobranza');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function stocks()
    {
    	return $this->hasOne('App\Stock');
    }

}
