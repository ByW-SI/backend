<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ofertas')->insert([
            [
                'nombre_vino' => 'Merlot',
                'costo_botella' => 600,
                'porcentaje_transporte' => 20.5,
                'porcentaje_utilidad' => 30.2,
            ]
        ]);
    }
}
