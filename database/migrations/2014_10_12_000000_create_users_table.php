<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('appaterno');
            $table->string('apmaterno')->nullable();
            $table->date('nacimiento');
            $table->string('numero_telefono')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('puntos_corchos')->default('0');
            
            // $table->unsignedInteger('perfil_id');
            
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('perfil_id')->references('id')->on('perfiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
