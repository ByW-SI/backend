<?php

namespace App\Http\Controllers\Api\Venta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Venta;

class VentaController extends Controller
{
    public function store(Request $request)
    {
        $venta = new Venta;
        $venta->user_id = $request->user_id;
        $venta->status = $request->status;
        $venta->save();

        return response()->json($venta, 200);
    }
}
