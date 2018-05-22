<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVinicolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinicola', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('distinciones')->nullable();
            $table->string('inicio');
            $table->text('filosofia');
            $table->string('locacion');
            $table->string('enologo');
            $table->string('wine_maker')->nullable();
            $table->string('vinas')->nullable();
            $table->string('contacto')->nullable();
            $table->string('puesto')->nullable();
            $table->string('correo')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono');
            $table->string('calificacion')->nullable();
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
        Schema::dropIfExists('vinicola');
    }
}
