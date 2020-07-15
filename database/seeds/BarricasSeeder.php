<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarricasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barrica')->insert([
            [
                'enologo_id' => 1,
                'tipo_bar' => 'Eurpeo',
                'tostado' => 'Ligero',
                'uva' => 'Grenache',
                'bodega_id' => 1,
                'vinicola_id' => 1,
                'fecha_inicio' => '2020-01-01',
                'fecha_embotellado' => '2020-06-01',
                'meses_barrica' => 3,
                'meses_estabilizacion' => 5,
                'costo_uva' => 250,
                'costo_barrica' => 900,
            ]
        ]);
    }
}
