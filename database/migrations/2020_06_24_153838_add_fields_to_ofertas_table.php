<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofertas', function (Blueprint $table) {
            $table->dropColumn('precio');
            $table->decimal('costo_botella');
            $table->decimal('porcentaje_transporte');
            $table->decimal('porcentaje_utilidad');
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
            $table->decimal('precio');
            $table->dropColumn('costo_botella');
            $table->dropColumn('porcentaje_transporte');
            $table->dropColumn('porcentaje_utilidad');
        });
    }
}
