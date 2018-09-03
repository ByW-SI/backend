<?php

namespace App\Http\Controllers\Api\Barrica;

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
        $barricas = Barrica::get();
        return response()->json(['barricas'=>$barricas],200);
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
        $barrica->bodega;
        $barrica->enologo;
        $barrica->vinicola;
        return response()->json(['barrica'=>$barrica]);
    }

    
}
