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
            $table->morphs('producido');
            $table->integer("barrica_bodega_id")->unsigned();
            $table->foreign('barrica_bodega_id')->references('id')->on('barrica_bodega');
            $table->string('uva');
            $table->date('fecha_inicio');
            $table->date('fecha_embotellado');
            $table->integer('meses_barrica');
            $table->integer('meses_estabilizacion');
            $table->decimal('precio_uva', 8, 2)->nullable();
            $table->decimal('precio_prod', 8, 2);
            $table->decimal('precio_venta', 8, 2);
            $table->date('fecha_envio')->nullable(); 
            $table->integer('anada')->nullable();   
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
