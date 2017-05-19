<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobranza extends Model
{
    protected $table = "cobranzas";
    protected $fillable = ['pedido_id','tipo','importe','user_id'];

    public function pedido()
    {
    	return $this->belongsTo('App\Pedido', 'pedido_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
}
