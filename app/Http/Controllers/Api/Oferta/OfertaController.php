<?php

namespace App\Http\Controllers\Api\Oferta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oferta;

class OfertaController extends Controller
{
    public function cotizar(Request $request)
    {
        $oferta = new Oferta;
        $oferta->costo_botella = $request->costo_botella;
        $oferta->porcentaje_transporte = $request->porcentaje_transporte;
        $oferta->porcentaje_utilidad = $request->porcentaje_utilidad;
        return response()->json([
            'costo_caja' => $oferta->costo_caja,
            'subtotal_venta' => $oferta->subtotal_venta,
            'costo_transporte' => $oferta->costo_transporte,
            'precio_publico' => $oferta->precio_publico,
        ], 200);
    }
}
