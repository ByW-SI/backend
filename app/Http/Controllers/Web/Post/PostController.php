<?php

namespace App\Http\Controllers\Web\Post;

use App\Post;
use App\Categoria;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('title','asc')->paginate(10);
        return view('post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::orderBy('name','asc')->get();
        $etiquetas = Tag::orderBy('name','asc')->get();
        $mis_categorias = [];
        $mis_etiquetas = [];
        return view('post.form',['edit'=>false, 'categorias'=>$categorias,'etiquetas'=>$etiquetas,'mis_categorias'=>$mis_categorias,'mis_etiquetas'=>$mis_etiquetas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'title' => 'required|string|unique:posts,title',
            'subtitle' => 'nullable|string',
            'slug' => 'required|alpha_dash|unique:posts,slug|max:100',
            'body'=>'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',     

        ]);
        $post = Post::create($request->all());
        if($request->categorias){
            foreach ($request->categorias as $cat) {
                $categoria = Categoria::firstOrCreate([
                    'name'=>$cat
                ],[
                    'slug'=>strtolower ( preg_replace('~[^\pL\d]+~u','-',trim($cat)) )
                ]);
                if(!$post->categorias->contains($categoria)){
                    $post->categorias()->attach($categoria->id);
                }
                
            }

        }
        if($request->etiquetas){
            foreach ($request->etiquetas as $eti) {
                $tag = Tag::firstOrCreate([
                    'name'=>$eti
                ],[
                    'slug'=>strtolower ( preg_replace('~[^\pL\d]+~u','-',trim($eti)) )
                ]);
                if(!$post->tags->contains($tag)){
                    $post->tags()->attach($tag->id);
                }
                
            }
        }
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = $post->slug.'.'.$request->image->getClientOriginalExtension();
            $path = $request->image->storeAs('posts', $imageName, 'public');
            $post->image_path = $path;
            $post->save();
        }
        // dd($request->all());
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        return view('post.client-show',['post'=>$post]);
    }/**
     * Display the specified resource.
     *
     * @param  POST SLUG  $slug
     * @return \Illuminate\Http\Response
     */
    public function showPost($slug)
    {
        //
        $post = Post::where('slug',$slug)->first();
        if ($post) {
            return view('post.client-show',['post'=>$post]);
        }
        else{
            return response()->json(['no se encontro el post'],404);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categorias = Categoria::orderBy('name','asc')->get();
        $etiquetas = Tag::orderBy('name','asc')->get();
        if (!isset($post->categorias)) {
            $mis_categorias = array_column($post->categorias, 'name');
        }
        else{
            $mis_categorias = [];
        }
        if (!isset($post->tags)) {
            $mis_etiquetas = array_column($post->tags, 'name');
        }
        else{
            $mis_etiquetas = [];
        }
        return view('post.form',['edit'=>true,'post'=>$post, 'categorias'=>$categorias,'etiquetas'=>$etiquetas,'mis_categorias'=>$mis_categorias,'mis_etiquetas'=>$mis_etiquetas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([

            'title' => 'required|string|unique:posts,title,'.$post->id,
            'subtitle' => 'nullable|string',
            'slug' => 'required|alpha_dash|max:100|unique:posts,slug,'.$post->id,
            'body'=>'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        // dd($request->all());
        $post->update($request->all());
        if($request->categorias){
            foreach ($request->categorias as $cat) {
                $categoria = Categoria::firstOrCreate([
                    'name'=>$cat
                ],[
                    'slug'=>strtolower ( preg_replace('~[^\pL\d]+~u','-',trim($cat)) )
                ]);
                if(!$post->categorias->contains($categoria)){
                    $post->categorias()->attach($categoria->id);
                }
                
            }

        }
        if($request->etiquetas){
            foreach ($request->etiquetas as $eti) {
                $tag = Tag::firstOrCreate([
                    'name'=>$eti
                ],[
                    'slug'=>strtolower ( preg_replace('~[^\pL\d]+~u','-',trim($eti)) )
                ]);
                if(!$post->tags->contains($tag)){
                    $post->tags()->attach($tag->id);
                }
                
            }
        }
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = $post->slug.'.'.$request->image->getClientOriginalExtension();
            $path = $request->image->storeAs('posts', $imageName, 'public');
            $post->image_path = $path;
            $post->save();
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

        $post->delete();
        return redirect()->route('posts.index');
    }

    /**
     * Store a newly created image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imagenUpload(Request $request)
    {
        //
        // dd(time());
        $request->validate([

            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
             $imageName = time().'.'.$request->file->getClientOriginalExtension();
            $path = $request->file->storeAs('posts', $imageName, 'public');

            return response()->json(['link'=>url('storage/'.$path)],201);
        }
        else{
            return 404;
        }

    }
    public function videoUpload(Request $request)
    {
        $request->validate([

            'file' => 'required|mimetypes:video/avi,video/mpeg,video/mp4,video/mkv|max:90000',

        ]);
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
             $videoName = time().'.'.$request->file->getClientOriginalExtension();
            $path = $request->file->storeAs('posts', $videoName, 'public');

            return response()->json(['link'=>url('storage/'.$path)],201);
        }
        else{
            return 404;
        }
    }
    public function fileUpload(Request $request)
    {
        $request->validate([

            'file' => 'required|mimetypes:text/plain,application/msword,application/x-pdf,application/pdf,text/html|max:2048',

        ]);
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
             $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $path = $request->file->storeAs('posts', $fileName, 'public');

            return response()->json(['link'=>url('storage/'.$path)],201);
        }
        else{
            return 404;
        }
    }
}
