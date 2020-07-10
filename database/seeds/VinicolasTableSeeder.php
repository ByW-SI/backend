<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VinicolasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vinicola')->insert([
            'nombre' => 'Vini-king',
            'tipo' => 'Vinicola',
            'inicio' => 'inicio',
            'filosofia' => 'Más que una vinicola',
            'locacion' => 'Ciudad de México',
            'telefono' => '5534562154',
            'hectareas' => 100.50
        ]);
    }
}
