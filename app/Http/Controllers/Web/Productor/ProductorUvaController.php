<?php

namespace App\Http\Controllers\Web\Productor;

use App\DatoPersonal;
use App\Direccion;
use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use App\ProductorUva;
use App\Services\StoreProductorUvaService;
use App\Uva;
use App\UvaProducida;

class ProductorUvaController extends Controller
{

    public function index()
    {
        $productoresUvas = ProductorUva::get();
        return view('productores.uvas.index', compact('productoresUvas'));
    }

    public function create()
    {
        $edit = false;
        $uvas = Uva::get();
        return view('productores.uvas.form', compact('edit', 'uvas'));
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

        $uvasProducidas = collect();

        // dd($request->uvas_ids);

        for ($i = 0; $i < count($request->uvas_ids); $i++) {
            $uvaProducida = new UvaProducida;
            $uvaProducida->uva_id = Uva::where('title', $request->uvas_ids[$i])->first()->id;
            $uvaProducida->hectareas = $request->hectareas[$i];
            $uvaProducida->ubicacion_plantio = $request->ubicaciones_plantios[$i];
            $uvasProducidas->push($uvaProducida);
        }

        // dd($uvasProducidas);

        $storeProductorUvaService = new StoreProductorUvaService($persona, $direccion, $empresa, $uvasProducidas);
        $storeProductorUvaService->execute();

        return redirect()->route('productores.uvas.index');
    }

    public function edit(ProductorUva $productorUva)
    {
        $productor = $productorUva;
        $edit = true;
        $uvas = Uva::get();
        return view('productores.uvas.form', compact('edit', 'uvas', 'productor'));
    }

    public function update(ProductorUva $productorUva){

    }

    public function destroy()
    {
    }
}
