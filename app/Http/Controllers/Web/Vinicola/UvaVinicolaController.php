<?php

namespace App\Http\Controllers\Web\Vinicola;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UvaVinicola;

class UvaVinicolaController extends Controller
{
    //
    public function destroy(UvaVinicola $uvaVin)
    {
    	$uvaVin->delete();
    	return redirect()->route('vinicolas.index');
    }
}
