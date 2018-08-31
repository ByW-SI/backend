<?php

namespace App\Http\Controllers\Api\Punto;

use App\Punto;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class PuntoController extends Controller
{

    public function canjear(Request $request)
    {
        $user = $request->user();
        $codigo = $request->codigo;

        $punto = Punto::where('codigo', $codigo)->first();
        // dd($punto->isExpired());
        // Si no existe
        if(!$punto){
            return response()->json(['error'=>"el codigo es invalido"],404);
        }
        // Si ya expiro
        if($punto->isExpired()){
            return response()->json(['error'=>'El codigo ya expiro'],403);
        }
        // Si es el mismo punto que el creo
        if($user->id == $punto->user_id){
            return response()->json(['error'=>'No puedes usar el mismo codigo que creaste'],403);
        } 
        // Si este codigo ya fue usado por el mismo usuario
        if ($this->esSegundoIntento($punto,$user)) {
            return response()->json(['error'=>'Este codigo ya lo utilizaste'],403);
        }
        else{
            $punto->users()->attach($user->id, [
                'usado' => Carbon::now(),
            ]);
            // Suma los puntos corchos del que uso el codigo
            $user->puntos_corchos += $punto->puntos;
            $user->save();
            // Suma puntos del dueño del codigo
            $dueño = $punto->user;
            $dueño->puntos_corchos += $punto->puntos;
            $dueño->save();
            return response()->json(['message'=>'Se sumaron los puntos corchos'],200);
        }

        
    }

    public function esSegundoIntento($punto , $user)
    {
        return $punto->users()->wherePivot('user_id', $user->id)->exists();
        
    }
    


}
