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
        DB::table('productor')->insert([
            [
                'nombre' => 'Winers',
                'locacion' => 'Pedregal #39',
                'telefono' => '58345678',
                'bodega_id' => '1',
                'vinicola_id' => '1',
            ]
        ]);
    }
}
