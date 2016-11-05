<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->double('precio', 10, 2);
            $table->integer('imagen_id')->unsigned();
            $table->foreign('imagen_id')->references('id')->on('imagenes');
            $table->integer('receta_id')->unsigned();
            $table->foreign('receta_id')->references('id')->on('recetas');
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')->on('listaprecios');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('articulos');
    }
}
