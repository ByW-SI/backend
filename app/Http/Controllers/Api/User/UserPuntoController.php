<?php

namespace App\Http\Controllers\Api\User;

use App\Punto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user= $request->user();
        $puntos=$user->puntos_corchos;
        $misCupones = $user->miCupones;
        // dd($misCupones);
        $cupones = $user->cupones;
        return response()->json(['miscupones'=>$misCupones,'cupones'=>$cupones,'mispuntos'=>$puntos],201);

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
        $user=$request->user();
        $last_punto = Punto::orderBy('expira', 'desc')->first();
        // dd($last_punto->isExpired());
        if (!$last_punto || $last_punto->isExpired()) {
            $punto= Punto::create([
                'user_id'=>$user->id,
                'expira'=> Carbon::now()->addDays(30),
                'codigo'=>$this->generar(),
                'puntos'=>10,
            ]);
            
            return response()->json(['punto'=>$punto],201);
        }
        else {
            return response()->json(['error'=>'Tu código aun no a expirado'],401);   
        }

    }

    private function generar()
    {
        $characters = '0123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
        $parts = [];
        for ($i = 0; $i < 3; ++$i) {
            $parts[] = substr(str_shuffle($characters), 0, 4);
        }
        $code = implode($parts, '-');
        $exist = Punto::where('codigo', $code)->first();
        if($exist){
            $this->generate();
        }
        else{
            return $code;
        }
    }




}
