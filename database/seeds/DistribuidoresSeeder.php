-<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistribuidoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distribuidores')->insert([
            [
                'persona_id' => 2
            ]
        ]);
    }
}
