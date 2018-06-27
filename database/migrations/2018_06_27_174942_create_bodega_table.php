<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodegaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodega', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('marcas')->nullable();
            $table->string('logo')->nullable();
            $table->string('vista')->nullable();
            $table->string('locacion');
            $table->double('long',20,17)->default(0.00000);
            $table->double('lat',20,17)->default(0.00000);
            $table->integer('enologo_id')->unsigned()->nullable();
            $table->foreign('enologo_id')->references('id')->on('enologo');
            $table->integer('wine_maker_id')->unsigned()->nullable();
            $table->foreign('wine_maker_id')->references('id')->on('enologo');
            $table->string('contacto')->nullable();
            $table->string('puesto')->nullable();
            $table->string('correo')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono');
            $table->boolean('productora')->default(false);
            $table->integer('vinicola_id')->unsigned()->nullable();
            $table->foreign('vinicola_id')->references('id')->on('vinicola');
            $table->text('uvas')->nullable();
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
        Schema::dropIfExists('bodega');
    }
}
