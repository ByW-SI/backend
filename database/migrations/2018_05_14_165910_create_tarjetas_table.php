<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('tipo');
            $table->string('numero');
            $table->string('nombre');
            $table->string('pais');
            $table->string('calle');
            $table->string('numext');
            $table->string('numint')->default("1");
            $table->string('colonia');
            $table->string('cp');
            $table->string('estado');
            $table->string('municipio');
            $table->string('delegacion');
            $table->string('verifica');
            $table->string('expira');
            $table->softDeletes();
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
        Schema::dropIfExists('tarjetas');
    }
}
