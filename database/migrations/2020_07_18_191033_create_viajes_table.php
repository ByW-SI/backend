<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lugar')->nullable();
            $table->string('puntos_interes')->nullable();
            $table->unsignedBigInteger('direccion_id')->nullable();
            $table->unsignedBigInteger('direccion_inicio_id')->nullable();
            $table->unsignedBigInteger('direccion_termino_id')->nullable();
            $table->string('duracion')->nullable();
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('enoturista_id');
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
        Schema::dropIfExists('viajes');
    }
}
