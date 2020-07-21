<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
            'nombre' => 'Cesar',
            'apellido_paterno' => 'Carmona',
        ]);
    }
}
