<?php

namespace App\Http\Controllers\Web\Vinicola;

use App\Http\Controllers\Controller;
use App\Marca;
use App\Vinicola;
use Illuminate\Http\Request;

class VinicolaMarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vinicola $vinicola)
    {
        //
        $edit = false;
        return view('vinicola.marcas.create',['edit'=>$edit,'vinicola'=>$vinicola]);
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
            'vinicola_id'=>"required|number"
            'nombre'=>"required|unique:marcas_vinicola"
        ];
         $validater = $this->validate($request,$rules);
         $marca = Marca::create($request->all());
         return redirect()->route('vinicola.marcas.index',["vinicola"=>$vinicola, 'marcas'=>$vinicola->marcas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
    }
}
