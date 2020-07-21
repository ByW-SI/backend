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
        $this->call(PaisesSeeder::class);
        $this->call(RegionesTableSeeder::class);
        $this->call(SeccionesTableSeeder::class);
        $this->call(PerfilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UvasTableSeeder::class);
        $this->call(EnologosTableSeeder::class);
        $this->call(BodegasTableSeeder::class);
        $this->call(VinicolasTableSeeder::class);
        $this->call(ProductoresSeeder::class);
        $this->call(BarricasSeeder::class);
        $this->call(OfertasSeeder::class);
        $this->call(PersonasSeeder::class);
        $this->call(CursosSeeder::class);
    }
}
