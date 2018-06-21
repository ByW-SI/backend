<?php

namespace App\Http\Controllers\Web\Vinicola;

use App\Http\Controllers\Controller;
use App\Uva;
use App\UvaVinicola;
use App\Vinicola;
use Illuminate\Http\Request;

class VinicolaUvasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vinicola $vinicola)
    {
        //
        $uvas = $vinicola->uvas;
        return view('vinicola.uvas.index',['vinicola'=>$vinicola,'uvas'=>$uvas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vinicola $vinicola)
    {
        //
        $uvas = Uva::get();
        $edit = false;
        return view('vinicola.uvas.form',['edit'=>$edit,'vinicola'=>$vinicola,'uvas'=>$uvas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Vinicola $vinicola,Request $request)
    {
        //
        $rules =[
            'vinicola_id'=>"required|integer",
            'uva_id' => "required|integer",
            'hectareas' => "required|numeric",
        ];
        $this->validate($request, $rules);
        $uva = Uva::find($request->uva_id);
        // dd($uva);
        UvaVinicola::create([
            'vinicola_id' => $request->vinicola_id,
            'nombre' => $uva->title,
            'uva_id' => $request->uva_id,
            'hectareas' => $request->hectareas,
        ]);
        return redirect()->route('vinicolas.uvas.index',['vinicola'=>$vinicola]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UvaVinicola  $uvaVinicola
     * @return \Illuminate\Http\Response
     */
    public function show(UvaVinicola $uvaVinicola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UvaVinicola  $uvaVinicola
     * @return \Illuminate\Http\Response
     */
    public function edit(UvaVinicola $uvaVinicola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UvaVinicola  $uvaVinicola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UvaVinicola $uvaVinicola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UvaVinicola  $uvaVinicola
     * @return \Illuminate\Http\Response
     */
    public function destroy(UvaVinicola $uvaVinicola)
    {
        //
    }
}
