<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecetaingredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetaingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->double('cantidad', 10, 0);
            $table->integer('receta_id')->unsigned();
            $table->foreign('receta_id')->references('id')->on('recetas');
            $table->integer('ingrediente_id')->unsigned();
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
            $table->double('precio', 10, 0);
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
        Schema::drop('recetaingredientes');
    }
}
