<?php

namespace App\Http\Controllers\Web\Bodega;

use App\BarricaBodega;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BodegaBarricaController extends Controller
{
    
    public function destroy(BarricaBodega $barrica)
    {
        //
        $barrica->delete();
        return redirect()->route('bodegas.index');
    }
}
