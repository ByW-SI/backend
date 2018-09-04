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

    public function search(Request $request){
        // dd($request->uva);
        $barricas = new Barrica();
        if($request->uva){
            $barricas = $barricas->where('uva',$request->uva);
            // dd('aqui');
        }
        if($request->tipo_bar){
            $barricas = $barricas->where('tipo_bar',$request->tipo_bar);
        }

        if ($request->tostado) {
            $barricas = $barricas->where('tostado',$request->tostado);
        }
        if ($request->bodega_id) {
            $barricas = $barricas->where('bodega_id',$request->bodega_id);
        }
        if ($request->vinicola_id) {
            $barricas = $barricas->where('vinicola_id',$request->vinicola_id);
        }

        $barricas = $barricas->get();
        return response()->json(['barricas'=>$barricas],201);

    }
}
