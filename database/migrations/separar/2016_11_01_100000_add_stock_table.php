<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->double('costo', 10, 2);
            $table->integer('movimiento_id')->unsigned();
            $table->foreign('movimiento_id')->references('id')->on('movimientos');
            $table->enum('tipo',['positivo', 'negativo'])->default('positivo');
            $table->enum('estado',['pendiente', 'confirmado'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stock');
    }
}
