<?php

namespace App\Http\Controllers\Api\User;

use App\DomFiscal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class UserDomFiscalController extends Controller
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
        $domicilio_fiscal = $user->domFiscal;
        // return response()->json(['domicilio' => $domicilio_fiscal],200);
        if ($domicilio_fiscal == null) {
            # code...
            return response()->json(['message'=>"No hay registro"],200);
        }
        else{
            
            return response()->json(['domicilio' => $domicilio_fiscal],200);
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
        if ($user->domFiscal == null) {
            # code...
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
            $domicilio_fiscal = DomFiscal::create([
                "user_id" => $user->id,
                "pais" => $data['pais'],
                "estado" => $data['estado'],
                "municipio" => $data['municipio'],
                "ciudad" => $data['ciudad'],
                "colonia" => $data['colonia'],
                "calle" => $data['calle'],
                "numext" => $data['numext'],
                "numint" => ($data['numint'] == null ? "1" : $data['numint'] )
            ]);

            return response()->json([$domicilio_fiscal],200);

        }
        else{
            
            return response()->json(['message'=>"Ya tienes tu dirección fiscal"],200);
        }
       

    }

    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DomFiscal  $domFiscal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$domFiscal)
    {
        //

        // dd($domFiscal);
        $user = $request->user();
        $domicilio_fiscal = $user->domFiscal;
        $data = $request->all();
        // dd($request->all());
        // dd($domicilio_fiscal);
        if ($domicilio_fiscal == null) {

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

            $domicilio_fiscal->update([
                "pais" => $data['pais'],
                "estado" => $data['estado'],
                "municipio" => $data['municipio'],
                "ciudad" => $data['ciudad'],
                "colonia" => $data['colonia'],
                "calle" => $data['calle'],
                "numext" => $data['numext'],
                "numint" => ($data['numint'] == null ? "1" : $data['numint'] )
            ]);
            return response()->json([$domicilio_fiscal],200);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DomFiscal  $domFiscal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DomFiscal $domFiscal)
    {
        //

        $user = $request->user();
        $domicilio_fiscal = $user->domFiscal;

        if ($domicilio_fiscal == null) {

            return response()->json(['message'=>"Necesitas crear una direccion fiscal"],200);
        }
        else{
            $domicilio_fiscal->delete();
            return response()->json(['message'=>"Direccion fiscal eliminada con éxito"],200);
        }

    }
}
