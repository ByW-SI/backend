<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVinicolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinicola', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('nombre')->unique();
            $table->text('distinciones')->nullable();
            // $table->string('marcas')->nullable();
            $table->string('inicio');
            $table->text('filosofia');
            $table->string('locación');
            $table->double('long',20,17)->default(0.00000);
            $table->double('lat',20,17)->default(0.00000);
            $table->string('contacto')->nullable();
            $table->string('puesto')->nullable();
            $table->string('correo')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono');
            $table->text('comentarios')->nullable();
            $table->double('hectareas',6,3);
            $table->text('uvas');
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
        Schema::dropIfExists('vinicola');
    }
}
