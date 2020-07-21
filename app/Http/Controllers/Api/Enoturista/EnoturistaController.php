<?php

namespace App\Http\Controllers\Api\Enoturista;

use App\Enoturista;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnoturistaController extends Controller
{
    public function index()
    {
        $enoturistas = Enoturista::with('persona')
            ->with('viaje')
            ->with('viaje.direccion')
            ->with('viaje.direccionInicio')
            ->with('viaje.direccionTermino')
            ->get();
        
        return response()->json(
            $enoturistas,
            200
        );
    }
}
