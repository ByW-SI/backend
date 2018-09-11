<?php

namespace App\Http\Controllers\Api\Barrica;

use App\Barrica;
use App\Bodega;
use App\Http\Controllers\Controller;
use App\Vinicola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        $tipo_bars = $barricas->distinct('tipo_bar')->pluck('tipo_bar');
        $uvas = $barricas->distinct('uva')->pluck('uva');
        $tostados = $barricas->distinct('tostado')->pluck('tostado');
        // dd($tostado);
        $bodegas_id = $barricas->distinct('bodega_id')->pluck('bodega_id');
        // dd($bodegas_id);
        $bodegas= array();
        foreach ($bodegas_id as $id) {
            $bodega = Bodega::find($id);
            array_push($bodegas,$bodega);
        }
        $vinicolas_id = $barricas->distinct('vinicola_id')->pluck('vinicola_id');
        // dd($vinicolas_id);
        $vinicolas= array();
        foreach ($vinicolas_id as $id) {
            $vinicola = Vinicola::find($id);
            array_push($vinicolas,$vinicola);
        }
        
        $barricas = $barricas->get();

        return response()->json(['bodegas'=>$bodegas,'vinicolas'=>$vinicolas,'tipo_bars'=>$tipo_bars,'uvas'=>$uvas,'tostados'=>$tostados,'barricas'=>$barricas],201);

    }
}
