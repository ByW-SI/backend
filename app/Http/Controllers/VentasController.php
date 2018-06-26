<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uva;
use App\Vinicola;
use App\User;

class VentasController extends Controller
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
        $productores = Vinicola::get();
        $usuarios = User::get();
        return view('reporte.venta',['uvas'=>$uvas,'productores'=>$productores,'usuarios'=>$usuarios]);
    }

    
}
