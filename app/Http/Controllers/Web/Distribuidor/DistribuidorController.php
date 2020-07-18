<?php

namespace App\Http\Controllers\Web\Distribuidor;

use App\Direccion;
use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Services\StoreDistribuidorService;

class DistribuidorController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {

        $persona = new Persona;
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->celular = $request->celular;
        $persona->correo = $request->correo;

        $empresa = new Empresa;
        $empresa->nombre = $request->nombre_empresa;
        $empresa->telefono = $request->telefono_empresa;
        $empresa->sitio_web = $request->sitio_web_empresa;
        $empresa->inicio_operaciones = $request->fecha_inicio_operaciones_empresa;

        $direccionEmpresa = new Direccion;
        $direccionEmpresa->calle = $request->calle;
        $direccionEmpresa->num_exterior = $request->num_exterior;
        $direccionEmpresa->num_interior = $request->num_interior;
        $direccionEmpresa->localidad = $request->localidad;
        $direccionEmpresa->ciudad = $request->ciudad;
        $direccionEmpresa->municipio = $request->municipio;
        $direccionEmpresa->estado = $request->estado;
        $direccionEmpresa->codigo_postal = $request->codigo_postal;

        $storeDistribuidorService = new StoreDistribuidorService($persona, $empresa, $direccionEmpresa);
        $storeDistribuidorService->execute();

        return redirect()->back();
    }
}
