<?php

namespace App\Http\Controllers\Web\Vinicola;

use App\Vinicola;
use App\UvaProducida;
use App\Uva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class VinicolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vinicolas = Vinicola::orderBy('nombre','asc')->paginate(5);
        return view('vinicola.index',['vinicolas'=>$vinicolas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $edit = false;
        $uvas= Uva::orderBy('title','asc')->get();
        return view('vinicola.form',['edit'=>$edit,'uvas'=>$uvas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd(sizeof($request->input('uva')));
        $rules = [
            'nombre'=> 'required|unique:vinicola',
            'tipo' => 'required',
            'inicio'=> 'required',
            'filosofia'=> 'required',
            'locacion'=> 'required',
            'uva' =>'required',
            'telefono'=> 'required'
        ];
        $validater = $this->validate($request,$rules);
        $vinicola = Vinicola::create($request->all());
        for ($i = 0; $i < sizeof($request->input('uva')) ; $i++) {
            UvaProducida::create([
                'producidas_id'=>$vinicola->id,
                'producidas_type'=>"App\Vinicola",
                'nombre'=>$request->uva[$i],
                'hectarea'=>$request->hectarea[$i],
                'costo'=>$request->costo[$i]
            ]);
            
        }
        return redirect()->route('vinicolas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vinicola  $vinicola
     * @return \Illuminate\Http\Response
     */
    public function show(Vinicola $vinicola)
    {
        //
        // dd($vinicola);
        return view('vinicola.show',['vinicola'=>$vinicola]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vinicola  $vinicola
     * @return \Illuminate\Http\Response
     */
    public function edit(Vinicola $vinicola)
    {
        //
        $edit = true;
        $uvas= Uva::orderBy('title','asc')->get();
        return view('vinicola.form',['vinicola'=>$vinicola,'edit'=>$edit,'uvas'=>$uvas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vinicola  $vinicola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vinicola $vinicola)
    {
        //
        // dd($request->all());
        // dd($vinicola);
         $rules = [
            // 'nombre'=> 'required|unique:vinicola',
            'tipo' => 'required',
            'inicio'=> 'required',
            'filosofia'=> 'required',
            'locacion'=> 'required',

            'telefono'=> 'required'
        ];
        $validater = $this->validate($request,$rules);
        $vinicola->update([
            'tipo'=>$request->tipo,
            'distinciones'=>$request->distinciones,
            'inicio'=>$request->inicio,
            'filosofia'=>$request->filosofia,
            'locacion'=>$request->locacion,
            'lat'=>$request->lat,
            'long'=>$request->long,
            'contacto'=>$request->contacto,
            'puesto'=>$request->puesto,
            'correo'=>$request->correo,
            'celular'=>$request->celular,
            'telefono'=>$request->telefono,
            'comentarios'=>$request->comentarios,
            'hectareas'=>$request->hectareas
        ]);
        if ($request->uva[0] != null) {
            for ($i = 0; $i < sizeof($request->input('uva')) ; $i++) {
                UvaProducida::create([
                    'producidas_id'=>$vinicola->id,
                    'producidas_type'=>"App\Vinicola",
                    'nombre'=>$request->uva[$i],
                    'hectarea'=>$request->hectarea[$i],
                    'costo'=>$request->costo[$i]

                ]);
                
            }
        }
        
        // $vinicola->save();
        return redirect()->route('vinicolas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vinicola  $vinicola
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vinicola $vinicola)
    {
        //
        foreach ($vinicola->uvasVin as $uvaVin) {
            $uvaVin->delete();
        }
        $vinicola->delete();
        return redirect()->route('vinicolas.index');
    }
}
