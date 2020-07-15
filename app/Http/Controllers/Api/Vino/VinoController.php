<?php

namespace App\Http\Controllers\Api\Vino;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oferta;

class VinoController extends Controller
{
    public function index(){
        return response()->json(
            Oferta::get(),
            200
        );
    }
}
