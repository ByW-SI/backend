<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('direcciones')->insert([
            [
                'pais' => 'México',
                'calle' => '1ra cerrada',
                'num_exterior' => 12,
                'num_interior' => 10,
                'ciudad' => 'México',
                'municipio' => 'Municipio',
                'codigo_postal' => '09790'
            ]
        ]);
    }
}
