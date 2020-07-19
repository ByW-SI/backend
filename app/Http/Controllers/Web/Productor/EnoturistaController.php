<?php

namespace App\Http\Controllers\Web\Productor;

use App\Direccion;
use App\Empresa;
use App\Enoturista;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Services\StoreEnoturistaService;

class EnoturistaController extends Controller
{

    public function index(){
        $enoturistas = Enoturista::get();
        return view('enoturistas.index', compact('enoturistas'));
    }

    public function create()
    {
        $edit = false;
        return view('enoturistas.form', compact('edit'));
    }

    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->celular = $request->celular;
        $persona->correo = $request->correo;
        $persona->anio_inicio_actividades = $request->anio_inicio_actividades;
        $persona->semblanza_profesional = $request->semblanza_profesional;

        $direccion = new Direccion;
        $direccion->calle = $request->calle;
        $direccion->num_exterior = $request->num_exterior;
        $direccion->num_interior = $request->num_interior;
        $direccion->localidad = $request->localidad;
        $direccion->ciudad = $request->ciudad;
        $direccion->municipio = $request->municipio;
        $direccion->estado = $request->estado;
        $direccion->codigo_postal = $request->codigo_postal;

        $empresa = new Empresa;
        $empresa->nombre = $request->nombre_empresa;
        $empresa->telefono = $request->telefono_empresa;
        $empresa->sitio_web = $request->sitio_web_empresa;
        $empresa->inicio_operaciones = $request->fecha_inicio_operaciones_empresa;

        $storeEnoturistaService = new StoreEnoturistaService($persona, $direccion, $empresa);
        $storeEnoturistaService->execute();

        return redirect()->route('enoturistas.index');
    }

    public function edit(){
        
    }
}
