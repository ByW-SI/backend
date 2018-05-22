<?php

namespace App\Http\Controllers\Web\Vinicola;

use App\Vinicola;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('vinicola.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vinicola.form');
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
        return view('vinicola.show');
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
        return view('vinicola.form');
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
