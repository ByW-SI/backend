<?php

namespace App\Http\Controllers\Web\Vinicola;

use App\Vinicola;
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
        return view('vinicola.form',['edit'=>$edit]);
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
        // dd($request->all());
        $rules = [
            'nombre'=> 'required|unique:vinicola',
            'inicio'=> 'required',
            'filosofia'=> 'required',
            'locacion'=> 'required',
            'enologo'=> 'required',
            'telefono'=> 'required'
        ];
        $validater = $this->validate($request,$rules);
        $vinicola = Vinicola::create($request->all());
        return redirect()->route('vinicolas.marcas.create',['vinicola'=>$vinicola]);
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
        return view('vinicola.form',['vinicola'=>$vinicola,'edit'=>$edit]);
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
            'inicio'=> 'required',
            'filosofia'=> 'required',
            'locacion'=> 'required',
            'enologo'=> 'required',
            'telefono'=> 'required'
        ];
        $this->validate($request,$rules);
        $vinicola->update($request->all());
        // $vinicola->save();
        return redirect()->route('vinicolas.show',['vinicola'=>$vinicola]);
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
    }
}
