<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodegasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodega')->insert([
            [
                'nombre' => 'Atizapan',
                'descripcion' => 'Bodega en crecimiento',
                'locacion' => 'México',
                'telefono' => '5212328121',
                'costo_prod' => '20000',
            ]
        ]);
    }
}
