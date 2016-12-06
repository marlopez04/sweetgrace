<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPedidoarticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoarticulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->integer('articulo_id')->unsigned();
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->double('cantidad', 10, 0);
            $table->double('precio', 10, 2);
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
        Schema::drop('pedidoarticulos');
    }
}
