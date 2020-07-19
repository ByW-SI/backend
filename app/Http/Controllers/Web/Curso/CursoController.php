<?php

namespace App\Http\Controllers\Web\Curso;

use App\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::get();
        return view('cursos.index', compact('cursos'));
    }

    public function store(Request $request)
    {

        $persona = new Persona;
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->celular = $request->celular;
        $persona->correo = $request->correo;
        $persona->anio_inicio_actividades = $request->inicio_actividades;
        $persona->semblanza_profesional = $request->semblanza_profesional;
        $persona->save();

        $curso = new Curso;
        $curso->persona_id = $persona->id;
        $curso->save();

        return redirect()->route('cursos');
    }
}
