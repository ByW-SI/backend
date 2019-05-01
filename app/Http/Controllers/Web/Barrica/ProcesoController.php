<?php

namespace App\Http\Controllers\Web\Barrica;

use App\Proceso;
use App\Barrica;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Barrica $barrica)
    {
        //
        $procesos = $barrica->procesos()->orderby('inicio_proceso', 'asc')->paginate(5);
        return view('barrica.proceso.index',['barrica'=>$barrica,'procesos'=>$procesos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Barrica $barrica)
    {
        //
        $edit = false;
        return view('barrica.proceso.form',['barrica'=>$barrica,'edit'=>$edit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Barrica $barrica, Request $request)
    {
        //
        $rules =[
            'proceso'=>'required',
            'descripcion'=>'nullable',
            'inicio_proceso'=>'required|date',
            'fin_proceso'=>'required|date|after_or_equal:inicio_proceso',
            'imagen_proceso'=>'nullable|image',
        ];
        $this->validate($request,$rules);
        if($request->hasFile('imagen_proceso')){
            $imagen_proceso_path = $request->imagen_proceso->storeAs('images/procesos'.$barrica->id, $request->proceso.$request->inicio_proceso.".jpg", 'public');
            $proceso = new Proceso($request->all());
            $proceso->imagen_proceso_path = $imagen_proceso_path;
            $barrica->procesos()->save($proceso);
        }
        else{
            $proceso = new Proceso($request->all());
            $barrica->procesos()->save($proceso);

        }
        return redirect()->route('barricas.procesos.index',['barrica'=>$barrica]);
        // dd($request->all());


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function show(Barrica $barrica, Proceso $proceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function edit(Barrica $barrica, Proceso $proceso)
    {
        //
        $edit = true;
        return view('barrica.proceso.form',['barrica'=>$barrica,'proceso'=>$proceso,'edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function update(Barrica $barrica, Request $request, Proceso $proceso)
    {
        //
        $rules =[
            'proceso'=>'required',
            'descripcion'=>'nullable',
            'inicio_proceso'=>'required|date',
            'fin_proceso'=>'required|date|after_or_equal:inicio_proceso',
            'imagen_proceso'=>'nullable|image',
        ];
        $this->validate($request,$rules);
        if($request->hasFile('imagen_proceso')){
            $imagen_proceso_path = $request->imagen_proceso->storeAs('images/procesos'.$barrica->id, $request->proceso.$request->inicio_proceso.".jpg", 'public');
            $proceso->update($request->all());
            $proceso->imagen_proceso_path = $imagen_proceso_path;
            $proceso->save();

        }
        else{
            $proceso->update($request->all());

        }
        return redirect()->route('barricas.procesos.index',['barrica'=>$barrica]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barrica $barrica, Proceso $proceso)
    {
        //
        $proceso->delete();
        return redirect()->route('barricas.procesos.index',['barrica'=>$barrica]);
    }
}
