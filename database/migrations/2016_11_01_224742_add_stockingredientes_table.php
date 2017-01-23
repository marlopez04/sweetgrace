<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStockingredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->double('costo', 10, 2);
            $table->double('cantidad', 10, 0);
            $table->integer('ingrediente_id')->unsigned();
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')->references('id')->on('stock');
            $table->enum('estado',['pendiente', 'confirmado'])->default('pendiente');
            $table->enum('tipo',['ingreso', 'egreso'])->default('ingreso');
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
        Schema::drop('stockingredientes');
    }
}
