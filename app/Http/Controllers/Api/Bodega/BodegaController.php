<?php

namespace App\Http\Controllers\Api\Bodega;

use App\Bodega;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    //

    public function index()
    {
    	$bodega = Bodega::get();
    	return response()->json(['bodegas'=>$bodegas],201);
    }
}
