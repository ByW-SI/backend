<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();

            $table->string('estado')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('municipio')->nullable();
            $table->string('codigo_postal',5)->nullable();
            $table->string('calle')->nullable();
            $table->string('num_exterior')->nullable();
            $table->string('num_interior')->nullable();
            $table->string('localidad')->nullable();
            $table->double('long',20,17)->nullable();
            $table->double('lat',20,17)->nullable();

            $table->string('nombre_empresa')->nullable();
            $table->string('telefono_empresa')->nullable();
            $table->string('sitio_web_empresa')->nullable();

            $table->enum('tipo_productor',['Enólogo', 'Winemaker']);
            $table->unsignedInteger('anio_inicio_actividades')->nullable();
            $table->string('semblanza_profesional')->nullable();

            $table->string('premios_y_reconocimientos')->nullable();
            $table->string('etiquetas_producidas')->nullable();

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
        Schema::dropIfExists('productor');
    }
}
