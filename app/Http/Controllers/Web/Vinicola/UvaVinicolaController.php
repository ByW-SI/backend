<?php

namespace App\Http\Controllers\Web\Vinicola;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UvaProducida;

class UvaVinicolaController extends Controller
{
    //
    public function destroy(UvaProducida $uvaVin)
    {
    	$uvaVin->delete();
    	return redirect()->route('vinicolas.index');
    }
}
