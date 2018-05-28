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
            $table->string('title');
            $table->string('subtilte');
            $table->string('image');
            $table->text('olfato');
            $table->string('gusto');
            $table->string('vista');
            $table->string('maridaje');
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
