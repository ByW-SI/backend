<?php

namespace App\Http\Controllers\Web\Post;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    //
    public function index($slug)
    {
    	$categoria = Categoria::where('slug',$slug)->first();
    	if ($categoria) {
    		$posts= $categoria->posts;
    		return view('post.client-index',['posts'=>$posts,'name'=>$categoria->name]);
    	}
    	else{
    		 return response()->json(['no se encontro el post'],404);
    	}
    }
}
