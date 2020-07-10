<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnologosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enologo')->insert([
            'nombre' => 'Edgar',
            'paterno' => 'Figueroa',
            'materno' => 'Chavez',
            'tipo' => 'Enólogo',
            'cv' => 'Edgar ha trabajo junto a los mejores productores en el sur de Colombia',
        ]);
    }
}
