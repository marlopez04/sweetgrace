<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stock";
    protected $fillable = ['user_id'];

	public function stockinsumo()
    {
    	return $this->hasMany('App\StockInsumo');
    }

    public function stockinsumo()
    {
    	return $this->hasMany('App\StockInsumo');
    }

        public function users()
    {
    	return $this->belongsTo('App\User');
    }

}
