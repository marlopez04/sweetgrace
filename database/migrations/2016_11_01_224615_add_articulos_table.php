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
            $table->string('imagen', 60);
            $table->double('precio', 10, 2);
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')->on('listaprecios');
            $table->integer('receta_id')->unsigned();
            $table->foreign('receta_id')->references('id')->on('recetas');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
