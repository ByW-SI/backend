<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class VentaController extends Controller
{
    public function index(User $user){
        return response()->json( $user->ventas, 200 );
    }
}
