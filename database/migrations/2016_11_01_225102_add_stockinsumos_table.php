<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStockinsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockinsumos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('costo', 10, 2);
            $table->double('cantidad', 10, 0);
            $table->integer('insumo_id')->unsigned();
            $table->foreign('insumo_id')->references('id')->on('insumos');
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
        Schema::drop('stockinsumos');
    }
}
