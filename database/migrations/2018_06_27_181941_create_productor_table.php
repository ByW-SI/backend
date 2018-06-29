<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('locacion');
            $table->double('long',20,17)->nullable();
            $table->double('lat',20,17)->nullable();
            $table->string('contacto')->nullable();
            $table->string('puesto')->nullable();
            $table->string('correo')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono');
            $table->text('comentarios')->nullable();
            $table->integer('bodega_id')->unsigned();
            $table->foreign('bodega_id')->references('id')->on('bodega');
            $table->integer('vinicola_id')->unsigned();
            $table->foreign('vinicola_id')->references('id')->on('vinicola');
            $table->text('descripcion')->nullable();
            // $table->text('uvas');
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
        Schema::dropIfExists('productor');
    }
}
