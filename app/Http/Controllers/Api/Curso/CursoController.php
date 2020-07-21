<?php

namespace App\Http\Controllers\Api\Curso;

use App\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursoController extends Controller
{
    public function index()
    {
        $curso = Curso::with('persona')->get();

        return response()->json($curso, 200);
    }
}
