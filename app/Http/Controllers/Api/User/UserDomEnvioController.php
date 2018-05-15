<?php

namespace App\Http\Controllers\Api\User;

use App\DomEnvio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDomEnvioController extends Controller
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
        // dd($user);
        $domicilios = $user->domEnvio;
        // return response()->json(['domicilio' => $domicilios],200);
        if ($domicilios == null) {
            # code...
            return response()->json(['message'=>"No hay registro"],404);
        }
        else{
            
            return response()->json(['domicilio' => $domicilios],200);
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
        
         // Validation datas
        $rules = [
            "pais" => "required",
            "estado" => "required",
            "municipio" => "required",
            "ciudad" => "required",
            "colonia" => "required",
            "calle" => "required",
            "numext" => "required"
        ];
        $this->validate($request, $rules);

        // Create Domicilio Fiscal
        $domicilio = DomEnvio::create([
            "user_id" => $user->id,
            "pais" => $data['pais'],
            "estado" => $data['estado'],
            "municipio" => $data['municipio'],
            "ciudad" => $data['ciudad'],
            "colonia" => $data['colonia'],
            "calle" => $data['calle'],
            "numext" => $data['numext'],
            "numint" => ($data['numint'] == null ? "1" : $data['numint'] ),
            "entre1" => $data["entre1"],
            "entre2" => $data["entre2"],
            "referencia" => $data['referencia']
        ]);

        return response()->json([$domicilio],200);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DomEnvio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,DomEnvio $domicilio)
    {
        //
        $user = $request->user();
        // dd($domicilio);
        // $domicilio = $user->domEnvio->where('id', $domEnvio);

        if ($domicilio == null) {
            # code...
            return response()->json(['message'=>"No hay registro"],404);
        }
        else{
            if ($domicilio->user_id == $user->id) {
                # code...
                return response()->json(['domicilio' => $domicilio],200);
            } else {
                # code...
                return response()->json(['message'=>"No hay registro"],404);
            }
            
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DomEnvio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomEnvio $domicilio)
    {
        //
        $user = $request->user();
        // dd($user);
        // $domicilio = $user->domEnvio->where('id', $domicilio);
        $data = $request->all();
        // dd($request->all());
        // dd($domicilio);
        if ($domicilio->user_id == $user->id) {
            # code...
            if ($domicilio == null) {

                return response()->json(['message'=>"Necesitas crear una direccion fiscal"],200);
            }
            else{

                $rules = [
                    "pais" => "required",
                    "estado" => "required",
                    "municipio" => "required",
                    "ciudad" => "required",
                    "colonia" => "required",
                    "calle" => "required",
                    "numext" => "required"
                ];
                $this->validate($request, $rules);

                $domicilio->update([
                    "pais" => $data['pais'],
                    "estado" => $data['estado'],
                    "municipio" => $data['municipio'],
                    "ciudad" => $data['ciudad'],
                    "colonia" => $data['colonia'],
                    "calle" => $data['calle'],
                    "numext" => $data['numext'],
                    "numint" => ($data['numint'] == null ? "1" : $data['numint'] ),
                    "entre1" => $data["entre1"],
                    "entre2" => $data["entre2"],
                    "referencia" => $data['referencia']
                ]);
                return response()->json([$domicilio],200);

            }
        } else {
            # code...
            return response()->json(['message'=>"No hay registro"],404);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DomEnvio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DomEnvio $domicilio)
    {
        //
        

        $user = $request->user();
        // find user
        if ($domicilio->user_id == $user->id) {
            # code...
            $domicilio->delete();
            return response()->json(['message'=>"Direccion fiscal eliminada con éxito"],200);
        } else {
            # code...
            return response()->json(['message'=>"No hay registro"],404);
        }
        
    }
}
