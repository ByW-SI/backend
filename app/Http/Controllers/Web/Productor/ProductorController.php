<?php

namespace App\Http\Controllers\Web\Productor;

use App\Productor;
use App\Bodega;
use App\Vinicola;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productores = Productor::orderBy('nombre','asc')->paginate(5);
        return view('productor.index',['productores'=>$productores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bodegas = Bodega::orderBy('nombre','asc')->get();
        $vinicolas= Vinicola::orderBy('nombre','asc')->get();
        $edit=false;
        return view('productor.form',['edit'=>$edit,'vinicolas'=>$vinicolas,'bodegas'=>$bodegas]);
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
        $rules = [ 
            'nombre' =>"required|unique:productor",
            'locacion'=>"required",
            'telefono'=>"required",
            'bodega_id'=>"required",
            'vinicola_id'=>"required"
        ];

        $this->validate($request,$rules);

        Productor::create($request->all());

        return redirect()->route('productores.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function show(Productor $productor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function edit(Productor $productore)
    {
        //
        // dd($productore);
        $bodegas = Bodega::orderBy('nombre','asc')->get();
        $vinicolas= Vinicola::orderBy('nombre','asc')->get();
        $edit=true;
        return view('productor.form',['edit'=>$edit,'productor'=>$productore,'vinicolas'=>$vinicolas,'bodegas'=>$bodegas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productor $productore)
    {
        //
         $rules = [ 
            'locacion'=>"required",
            'telefono'=>"required",
            'bodega_id'=>"required",
            'vinicola_id'=>"required"
        ];
        // dd($productore);
        $this->validate($request,$rules);

        $productore->update($request->all());

        return redirect()->route('productores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productor  $productor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productor $productore)
    {
        //
        $productore->delete();
        
        return redirect()->route('productores.index');
    }

    public function bodega(Productor $id)
    {
        $bodega = $id->bodega;
        // dd($id->bodega);
        return response()->json(['bodega'=>$bodega],201);
    }

    public function barricas(Productor $id)
    {
        $barricas = $id->bodega->barricas;
        return response()->json(['barricas'=>$barricas],201);
    }
    public function vinicola(Productor $id)
    {
        $vinicola = $id->vinicola;
        return response()->json(['vinicola'=>$vinicola],201);
    }
    public function uvas(Productor $id)
    {

        $uvas = $id->vinicola->uvasVin->load('uva');
        // foreach ($uvas as $uvaVin) {
        //     $uvaVin->uva;
        // }
        return response()->json(['uvas'=>$uvas],201);
    }
}
