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
            $table->string('verifica');
            $table->string('expira');
            $table->string('pais')->nullable();
            $table->string('calle')->nullable();
            $table->string('numext')->nullable();
            $table->string('numint')->nullable();
            $table->string('colonia')->nullable();
            $table->string('cp')->nullable();
            $table->string('estado')->nullable();
            $table->string('municipio')->nullable();
            // $table->string('delegacion')->nullable();
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
