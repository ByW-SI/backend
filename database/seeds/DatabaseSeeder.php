<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeccionesTableSeeder::class);
        $this->call(PerfilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UvasTableSeeder::class);
        $this->call(EnologosTableSeeder::class);
        $this->call(BodegasTableSeeder::class);
        $this->call(VinicolasTableSeeder::class);
        $this->call(ProductoresSeeder::class);
    }
}
