<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productores')->insert([
            [
                'nombre' => 'Gabriel',
                'apellido_paterno' => 'Téllez',
                'apellido_materno' => 'Mendoza',
                'tipo_productor' => 'Enólogo',
                'estado' => 'CDMX',
                'nombre_empresa' => 'Zwinker'
            ]
        ]);
    }
}
