<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_bar');
            $table->integer('uva_vinicola_id')->unsigned();
            $table->foreign('uva_vinicola_id')->references('id')->on('uvas_vinicola');
            $table->integer('vinicola_id')->unsigned();
            $table->foreign('vinicola_id')->references('id')->on('vinicola');
            $table->decimal('precio_barrica',8,2);
            $table->decimal('precio_publico',8,2);
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
        Schema::dropIfExists('barrica');
    }
}
