<?php

namespace App\Http\Controllers\Api\Enologo;

use App\Enologo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnologoController extends Controller
{
    public function index(){
        return response()->json(
            Enologo::get(),
            200
        );
    }
}