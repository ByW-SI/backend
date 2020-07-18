<?php

namespace App\Http\Controllers\Web\Productor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnoturistaController extends Controller
{
    public function create()
    {
        $edit = false;
        return view('enoturistas.form', compact('edit'));
    }
}
