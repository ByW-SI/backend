<?php

use App\Seccion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secciones = array(
            array('nombre'=>'enologos'),
            array('nombre'=>'vinicoles'),
            array('nombre'=>'bodeas'),
            array('nombre'=>'barricas'),
            array('nombre'=>'uvas'),
            array('nombre'=>'ofertas'),
            array('nombre'=>'viajes y cursos'),
            array('nombre'=>'usuarios'),
            array('nombre'=>'reportes'),
            array('nombre'=>'noticias'),
        );
        
        Seccion::insert($secciones);
    }
}
