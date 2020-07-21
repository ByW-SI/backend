<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosMasFrecuentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_mas_frecuentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_curso')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('carga_horaria')->nullable();
            $table->unsignedBigInteger('curso_id');
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
        Schema::dropIfExists('cursos_mas_frecuentes');
    }
}
