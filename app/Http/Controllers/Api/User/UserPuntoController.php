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
        $misCupones = $user->miCupones;
        // dd($misCupones);
        $cupones = $user->cupones;
        return response()->json(['miscupones'=>$misCupones,'cupones'=>$cupones],201);

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
        $punto= Punto::create([
            'user_id'=>$user->id,
            'expira'=> Carbon::now()->addDays(30),
            'codigo'=>$this->generar(),
            'puntos'=>10,
        ]);
        return response()->json(['punto'=>$punto]);

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
