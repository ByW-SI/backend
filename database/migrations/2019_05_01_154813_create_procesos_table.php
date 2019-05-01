<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('barrica_id');
            $table->foreign('barrica_id')->references('id')->on('barrica')->onDelete('cascade');
            $table->string('proceso');
            $table->text('descripcion')->nullable();
            $table->date('inicio_proceso');
            $table->date('fin_proceso');
            $table->string('imagen_proceso_path')->nullable();
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
        Schema::dropIfExists('procesos');
    }
}
