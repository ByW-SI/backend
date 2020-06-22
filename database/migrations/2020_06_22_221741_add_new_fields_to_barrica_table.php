<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToBarricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barrica', function (Blueprint $table) {
            $table->decimal('costo_levadura')->default(0);
            $table->decimal('costo_botella')->default(0);
            $table->decimal('costo_corcho')->default(0);
            $table->decimal('costo_etiqueta')->default(0);
            $table->decimal('costo_servicios_enologicos')->default(0);
            $table->decimal('porcentaje_administracion')->default(0);
            $table->decimal('porcentaje_utilidad')->default(0);
            $table->decimal('porcentaje_transporte')->default(0);
            $table->dropColumn('utilidad');
            $table->dropColumn('costo_total');
            $table->dropColumn('precio_publico');
            $table->dropColumn('costo_prod');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barrica', function (Blueprint $table) {
            $table->dropColumn('costo_levadura');
            $table->dropColumn('costo_botella');
            $table->dropColumn('costo_corcho');
            $table->dropColumn('costo_etiqueta');
            $table->dropColumn('costo_servicios_enologicos');
            $table->dropColumn('porcentaje_administracion');
            $table->dropColumn('porcentaje_utilidad');
            $table->dropColumn('porcentaje_transporte');
            $table->decimal('utilidad');
            $table->decimal('costo_total');
            $table->decimal('precio_publico');
            $table->decimal('costo_prod');
        });
    }
}
