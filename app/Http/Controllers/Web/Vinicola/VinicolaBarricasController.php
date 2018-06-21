<?php

namespace App\Http\Controllers\Web\Vinicola;

use App\Barrica;
use App\Vinicola;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VinicolaBarricasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vinicola $vinicola)
    {
        //

        $barricas = $vinicola->barricas;
        return view('vinicola.barricas.index',['vinicola'=>$vinicola,'barricas'=>$barricas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vinicola $vinicola)
    {
        //
        $uvas_vinicola = $vinicola->uvas;
        // dd($uvas_vinicola);
        $edit = false;
        return view('vinicola.barricas.form',['vinicola'=>$vinicola,'edit'=>$edit,'uvas_vinicola'=>$uvas_vinicola]);
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
        $rules=[
            'vinicola_id'=>"required|integer",
            'uva_vinicola'=>"required|integer",
            'tipo_bar'=>"required",
            'precio_barrica'=>"required|numeric",
            'precio_publico'=>"required|numeric"
        ];
        $this->validate($request,$rules);
        Barrica::create([
            'vinicola_id'=>$request->vinicola_id,
            'uva_vinicola_id'=>$request->uva_vinicola,
            'tipo_bar'=>$request->tipo_bar,
            'precio_barrica' => $request->precio_barrica,
            'precio_publico' => $request->precio_publico,
        ]);
        return redirect()->route('vinicolas.barricas.index',['vinicola'=>$vinicola]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function show(Vinicola $vinicola, Barrica $barrica)
    {
        //
        return view('vinicola.barricas.view',['vinicola'=>$vinicola,'barrica'=>$barrica]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function edit(Vinicola $vinicola, Barrica $barrica)
    {
        //
        $edit = true;
        return view('vinicola.barricas.form',['vinicola'=>$vinicola,'barrica'=>$barrica]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barrica $barrica)
    {
        //
        $rules=[
            'vinicola_id'=>"required|integer",
            'uva_vinicola_id'=>"required|integer",
            'tipo_bar'=>"required",
            'precio_barrica'=>"required|numeric",
            'precio_publico'=>"required|numeric"
        ];
        $this->validate($request,$rules);
        $barrica->update([
            'uva_vinicola_id'=>$request->uva_vinicola_id,
            'tipo_bar'=>$request->tipo_bar,
            'precio_barrica' => $request->precio_barrica,
            'precio_publico' => $request->precio_publico,
        ]);
        return redirect()->route('vinicolas.barricas.index',['vinicola'=>$vinicola]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vinicola $vinicola,Barrica $barrica)
    {
        //
        $barrica->delete();
        return redirect()->route('vinicolas.barricas.index',['vinicola'=>$vinicola]);
    }
}
