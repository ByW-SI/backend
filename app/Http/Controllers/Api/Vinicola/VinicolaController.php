<?php

namespace App\Http\Controllers\Api\Vinicola;

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
        $vinicolas = Vinicola::get();
        if ($vinicolas->count() == 0) {
            # code...
            return response()->json(['message'=>"No hay registro"],404);
        } else {
            # code...
            return response()->json(['vinicolas'=>$vinicolas],202);
        }
        

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
    }

}
