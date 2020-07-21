<?php

namespace App\Http\Controllers\Web\Curso;

use App\Curso;
use App\CursoMasFrecuente;
use App\Diploma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use Illuminate\Support\Facades\Storage;

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

        // dd( $request->cursos  );

        for ($i = 0; $i < count($request->cursos); $i++) {
            $cursoMasFrecuente = new CursoMasFrecuente;
            $cursoMasFrecuente->nombre_curso = $request->cursos[$i];
            $cursoMasFrecuente->objetivo = $request->objetivos[$i];
            $cursoMasFrecuente->carga_horaria = $request->cargas_horarias[$i];
            $cursoMasFrecuente->curso_id = $curso->id;
            $cursoMasFrecuente->save();
        }

        foreach ($request->diploma as $key => $diploma) {
            if ($diploma) {

                $extensionImagen = $diploma->getClientOriginalExtension();
                $imagenStored = Storage::disk('public')->putFileAs('cursos/diplomas/' . $curso->id, $diploma, $key . '.' . $extensionImagen);
    
                $imagen = Storage::url($imagenStored);
            }
            Diploma::create([
                'imagen' => $imagen,
                'curso_id' => $curso->id,
            ]);
        }

        // dd('Ok. Revisa que se haya guardado todo');

        return redirect()->route('cursos.index');
    }

    public function edit(Curso $curso){
        return view('cursos.edit', compact('curso'));
    }
}
