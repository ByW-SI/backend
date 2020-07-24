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
            'celular' => "5534567823",
        ]);

        DB::table('personas')->insert([
            "nombre" => 'Jose Luis',
            "apellido_paterno" => 'Allende',
            "apellido_materno" => 'Guerrero',
            "celular" => '55345678',
            "correo" => 'jose@mail.com',

            "anio_inicio_actividades" => "2012",
            "semblanza_profesional" => "Semblanza",
        ]);

        DB::table('direccion_persona')->insert([
            [
                'direccion_id' => 1,
                'persona_id' => 2,
            ]
        ]);
        
        DB::table('direccion_persona')->insert([
            [
                'direccion_id' => 1,
                'persona_id' => 1,
            ]
        ]);
    }
}
