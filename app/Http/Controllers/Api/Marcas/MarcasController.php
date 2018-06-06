<?php

namespace App\Http\Controllers\Api\Marcas;

use App\Marca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marcas = Marca::with('vinicola')->get();
        return response()->json(['marcas'=>$marcas],202);

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
        return response()->json(['marca'=>$marca],202);

    }
}
