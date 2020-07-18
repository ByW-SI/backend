<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUvasProducidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uvas_producidas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('productor_uva_id');
            $table->unsignedBigInteger('uva_id');
            $table->decimal('hectareas');
            $table->string('ubicacion_plantio');
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
        Schema::dropIfExists('uvas_producidas');
    }
}
