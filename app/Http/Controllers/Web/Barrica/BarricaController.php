<?php

namespace App\Http\Controllers\Web\Barrica;

use App\Barrica;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarricaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barricas = Barrica::orderBy('uva','asc')->paginate(5);

        return view('barrica.index',['barricas'=>$barricas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productoras = Productor::orderBy('nombre','asc')->get();
        $bodegas = Bodega::orderBy('nombre','asc')->get();
        $edit = false;
        return view('barrica.form',['productoras'=>$productoras,'bodegas'=>$bodegas,'edit'=>$edit]);
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
        if ($request->producido_type == "App\Productor") {
            $barrica = Barrica::create([
                'producido_type' == 'App\Productor',
            ]);
        } else {
            $barrica = Barrica::create([
                'producido_type' == 'App\Bodega',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function show(Barrica $barrica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function edit(Barrica $barrica)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barrica $barrica)
    {
        //
    }
}
