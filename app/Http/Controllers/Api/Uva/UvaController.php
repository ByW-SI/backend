<?php

namespace App\Http\Controllers\Api\Uva;

use App\Uva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uvas = Uva::get();
        if ($uvas->count() == 0) {
            # code...
            return response()->json(['message'=>'No hay registro'],404);
        } else {
            # code...
            return response()->json(['uvas'=>$uvas],202);
        }
        

    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Uva  $uva
     * @return \Illuminate\Http\Response
     */
    public function show(Uva $uva)
    {
        //
    }


}
