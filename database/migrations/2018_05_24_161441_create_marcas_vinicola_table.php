<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcasVinicolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas_vinicola', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vinicola_id')->unsigned();
            $table->foreign('vinicola_id')->references('id')->on('vinicola');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('marcas_vinicola');
    }
}
