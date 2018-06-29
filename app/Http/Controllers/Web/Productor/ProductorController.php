<?php

namespace App\Http\Controllers\Web\Productor;

use App\Productor;
use App\Bodega;
use App\Vinicola;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productores = Productor::orderBy('nombre','asc')->paginate(5);
        return view('productor.index',['productores'=>$productores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bodegas = Bodega::orderBy('nombre','asc')->get();
        $vinicolas= Vinicola::orderBy('nombre','asc')->get();
        $edit=false;
        return view('productor.form',['edit'=>$edit,'vinicolas'=>$vinicolas,'bodegas'=>$bodegas]);
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
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function show(Productor $productor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function edit(Productor $productor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productor $productor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productor $productor)
    {
        //
    }
}
