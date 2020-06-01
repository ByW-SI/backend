<?php

namespace App\Http\Controllers\Web\Empleados;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\User;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::noAdminsitradores()->get();
        return view('empleados.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfiles = Perfil::get();
        return view('empleados.form', compact('perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->nombre,
            'appaterno' => $request->apellidoPaterno,
            'apmaterno' => $request->apellidoMaterno,
            'nacimiento' => $request->nacimiento,
            'numero_telefono' => $request->numero_telefono,
            'email' => $request->correo,
            'password' => bcrypt($request->password),
            'perfil_id' => $request->perfil_id,
        ]);

        return redirect()->route('empleados.index')->with('success', 'El usuario ha sido creado exitosamente.');
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
        $usuario = User::find($id);
        $perfiles = Perfil::get();
        return view('empleados.edit', compact('usuario', 'perfiles'));
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
        $user = User::find($id);

        $user->update([
            "name" => $request->nombre,
            "email" => $request->correo,
            "perfil_id" => $request->perfil_id,
            "appaterno" => $request->apellido_paterno,
            "apmaterno" => $request->apellido_materno,
            "nacimiento" => $request->nacimiento,
            "numero_teleono" => $request->numero_telefono, 
        ]);

        !$request->password ?: $user->update([
            "password" => bcrypt($request->password),
        ]);

        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'El usuario ha sido eliminado exitosamente.');
    }
}
