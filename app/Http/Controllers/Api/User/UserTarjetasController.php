<?php

namespace App\Http\Controllers\Api\User;

use App\Tarjetas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTarjetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = $request->user();
        $tarjetas = $user->tarjetas;
        if ($tarjetas->count() == 0) {
            # code...
            return response()->json(['message'=>"no hay registro"], 404);
        } else {
            # code...
            return response()->json(['tarjetas'=>$tarjetas],202);
        }
        

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
        $user = $request->user();
        $data = $request->all();

        $rules = [

            "tipo" => "required",
            "numero" => "required",
            "nombre" => "required",
            "verifica" => "required",
            "expira" => "required",
        ];
        $this->validate($request,$rules);

        $tarjeta = Tarjetas::create([

            "user_id" => $user->id,
            "tipo" => $data['tipo'],
            "numero" => $data['numero'],
            "nombre" => $data['nombre'],
            "verifica" => $data['verifica'],
            "expira" => $data['expira'],
            "pais" => $data['pais'],
            "calle" => $data['calle'],
            "numext" => $data['numext'],
            "numint" => $data['numint'],
            "colonia" => $data['colonia'],
            "cp" => $data['cp'],
            "estado" => $data['estado'],
            "municipio" => $data['municipio'],
            
        ]);

        return response()->json([$tarjeta],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarjetas  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tarjetas $card)
    {
        //
        $user = $request->user();

        if ($card == null) {
            # code...
            return response()->json(["message"=>"No hay registro"],404);
        } else {
            # code...
            if ($card->user_id == $user->id) {
                # code...
                return response()->json(["tarjeta"=>$card],200);
            }
            return response()->json(["message"=>"No hay registro"],404);
        }
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarjetas  $card
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Tarjetas $card)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarjetas  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tarjetas $card)
    {
        //
        $user = $request->user();
        if ($card->user_id == $user->id) {
            # code...
            $card->delete();
            return response()->json(['message'=>"Tarjeta eliminada con éxito"],200);
        }
    }
}
