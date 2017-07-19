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
            $table->string('nombre');
            $table->integer('insumo_id')->unsigned();
            $table->foreign('insumo_id')->references('id')->on('insumos');
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')->references('id')->on('stock')->onDelete('cascade');
            $table->enum('tipo',['ingreso', 'egreso'])->default('ingreso');
            $table->double('unidad', 4, 0);
            $table->double('costo_u', 10, 2);
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
