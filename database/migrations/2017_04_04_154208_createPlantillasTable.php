<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePlantillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('tipo_plantilla');
            $table->longText('mensaje');
            $table->boolean('predeterminada')->default(false);
            $table->string('imagen_uno')->nullable();
            $table->string('imagen_dos')->nullable();
            $table->string('imagen_tres')->nullable();
            $table->string('imagen_cuatro')->nullable();
            $table->string('imagen_cinco')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plantillas');
    }
}
