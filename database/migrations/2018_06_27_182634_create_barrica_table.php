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
            // $table->morphs('producido');

            // $table->integer("barrica_bodega_id")->unsigned();
            // $table->foreign('barrica_bodega_id')->references('id')->on('barrica_bodega');
            // $table->string('producido');
            $table->integer('enologo_id')->unsigned();
            $table->foreign('enologo_id')->references('id')->on('enologo');
            $table->string('tipo_bar');
            $table->string('tostado');
            $table->string('uva');
            $table->integer('bodega_id')->unsigned()->nullable();
            $table->foreign('bodega_id')->references('id')->on('bodega');
            $table->integer('vinicola_id')->unsigned()->nullable();
            $table->foreign('vinicola_id')->references('id')->on('vinicola');
            $table->date('fecha_inicio');
            $table->date('fecha_embotellado');
            $table->integer('meses_barrica');
            $table->integer('meses_estabilizacion');
            $table->decimal('costo_uva', 8, 2)->nullable();
            $table->decimal('costo_barrica',8,2)->nullable();
            $table->decimal('costo_prod', 8, 2);
            $table->decimal('precio_venta', 8, 2);
            $table->date('fecha_envio')->nullable(); 
            $table->integer('anada')->nullable();
            $table->decimal('utilidad')->nullable(); 
            $table->integer('cajas')->default(22); 
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
