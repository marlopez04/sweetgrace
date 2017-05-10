<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = "saldos";
    protected $fillable = ['periodo','importe'];
}
