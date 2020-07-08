<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Cristian',
            'appaterno' => 'Guzmán',
            'apmaterno' => 'Guzmán',
            'nacimiento' => '1996-11-14',
            'numero_telefono' => '5552881001',
            'email' => 'admin@pwm.com',
            'password' => bcrypt('123456'),
            'puntos_corchos' => 5,
            'es_admin' => 1,
        ]);
    }
}
