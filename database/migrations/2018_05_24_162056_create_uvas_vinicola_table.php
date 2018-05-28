<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUvasVinicolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uvas_vinicola', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vinicola_id')->unsigned();
            $table->foreign('vinicola_id')->references('id')->on('vinicola');
            $table->string('nombre');
            $table->double('hectareas',5,2);
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
        Schema::dropIfExists('uvas_vinicola');
    }
}
