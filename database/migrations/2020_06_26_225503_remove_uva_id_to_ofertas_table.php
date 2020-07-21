<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUvaIdToOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            $table->dropColumn('uva_id');
            $table->text('comentario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            $table->unsignedBigInteger('uva_id');
            $table->dropColumn('comentario');
        });
    }
}
