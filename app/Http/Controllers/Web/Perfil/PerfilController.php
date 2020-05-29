<?php

namespace App\Http\Controllers\Web\Perfil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\Seccion;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles = Perfil::get();
        $secciones = Seccion::get();
        return view('perfiles.index', compact('perfiles', 'secciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secciones = Seccion::get();
        return view('perfiles.create', compact('secciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ids_secciones = Seccion::whereIn('nombre', $request->input('secciones'))
            ->get()
            ->pluck('id')
            ->toArray();

        $perfil = Perfil::create([
            'nombre' => $request->input('nombre')
        ]);

        $perfil->secciones()->attach($ids_secciones);

        return redirect()->route('perfiles.index')->with('success', 'El perfil ha sido creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = Perfil::find($id);
        $secciones = Seccion::get();
        return view('perfiles.edit', compact('perfil', 'secciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perfil = Perfil::find($id);
        $perfil->secciones()->detach();

        if (!is_null($request->secciones)) {
            $ids_secciones = Seccion::whereIn('nombre', $request->input('secciones'))->get()->pluck('id')->toArray();
            $perfil->secciones()->attach($ids_secciones);
        }

        $perfil->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('perfiles.index')->with('success', 'El perfil ha sido actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        // OBTENEMOS EL PERFIL
        $perfil = Perfil::find($id);


        // VALIDAMOS QUE NO TENGA USUARIOS EL PERFIL
        if ($perfil->users->count()) {
            return redirect()
                ->route('perfiles.index')
                ->with('error', 'No es posible eliminar el perfil, ya que cuenta con usuarios.');
        }

        // ELIMINAMOS EL PERFIL
        $perfil->secciones()->detach();
        $perfil->delete();
        return redirect()->route('perfiles.index')->with('success', 'El perfil se ha eliminado exitosamente.');
    }
}
