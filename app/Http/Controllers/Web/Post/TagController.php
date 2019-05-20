<?php

namespace App\Http\Controllers\Web\Post;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    //
    public function index($slug)
    {
    	$tag = Tag::where('slug',$slug)->first();
    	if ($tag) {
    		$posts= $tag->posts;
    		return view('post.client-index',['posts'=>$posts,'name'=>$tag->name]);
    	}
    	else{
    		 return response()->json(['no se encontro el post'],404);
    	}
    }
}
