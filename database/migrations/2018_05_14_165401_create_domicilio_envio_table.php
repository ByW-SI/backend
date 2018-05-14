<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomicilioEnvioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilio_envio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('pais')->default('México');
            $table->string('estado');
            $table->string('municipio');
            $table->string('ciudad');
            $table->string('colonia');
            $table->string('calle');
            $table->string('numext');
            $table->string('numint')->default('1');
            $table->string('entre1')->nullable();
            $table->string('entre2')->nullable();
            $table->text('referencia')->nullable();
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
        Schema::dropIfExists('domicilio_envio');
    }
}
