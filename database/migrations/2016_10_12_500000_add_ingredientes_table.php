<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->double('cantidad', 10, 0);
            $table->double('stockcritico', 10, 0);
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
        Schema::drop('ingredientes');
    }
}
