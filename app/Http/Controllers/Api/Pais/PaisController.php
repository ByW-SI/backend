<?php

namespace App\Http\Controllers\Api\Pais;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pais;

class PaisController extends Controller
{
    public function regiones(Pais $pais){
        
        return response()->json(
            $pais->regiones,
            200
        );
    }
}
