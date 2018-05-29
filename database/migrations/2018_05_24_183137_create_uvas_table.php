<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uvas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('subtitle')->nullable();
            $table->string('image');
            $table->text('olfato')->nullable();
            $table->text('gusto')->nullable();
            $table->text('vista')->nullable();
            $table->text('maridaje')->nullable();
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
        Schema::dropIfExists('uvas');
    }
}
