<?php

namespace App\Http\Controllers\Web\Productor;

use App\Productor;
use App\Bodega;
use App\Vinicola;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductorVinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productores = Productor::orderBy('nombre', 'asc')->paginate(5);
        return view('productores.vinos.index', ['productores' => $productores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bodegas = Bodega::orderBy('nombre', 'asc')->get();
        $vinicolas = Vinicola::orderBy('nombre', 'asc')->get();
        $edit = false;
        return view('productores.vinos.form', ['edit' => $edit, 'vinicolas' => $vinicolas, 'bodegas' => $bodegas]);
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
        // $rules = [ 
        //     'nombre' =>"required|unique:productor",
        //     'locacion'=>"required",
        //     'telefono'=>"required",
        //     'bodega_id'=>"required",
        //     'vinicola_id'=>"required"
        // ];
        // $this->validate($request,$rules);

        // dd($request->file());


        $productor = Productor::create($request->all());


        if ($request->file('premios_y_reconocimientos')) {
            $imagen = $request->file('premios_y_reconocimientos');
            $extensionImagen = $imagen->getClientOriginalExtension();

            $imagenStored = Storage::disk('public')->putFileAs('premios_y_reconocimientos/productor_' . $productor->id, $imagen, $productor->id . '.' . $extensionImagen);

            $productor->update([
                'premios_y_reconocimientos' => Storage::url($imagenStored)
            ]);
        }

        if ($request->file('etiquetas_producidas')) {
            $imagen = $request->file('etiquetas_producidas');
            $extensionImagen = $imagen->getClientOriginalExtension();

            $imagenStored = Storage::disk('public')->putFileAs('etiquetas_producidas/productor_' . $productor->id, $imagen, $productor->id . '.' . $extensionImagen);

            $productor->update([
                'etiquetas_producidas' => Storage::url($imagenStored)
            ]);
        }

        return redirect()->route('productores.vinos.index');
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
        $bodegas = Bodega::orderBy('nombre', 'asc')->get();
        $vinicolas = Vinicola::orderBy('nombre', 'asc')->get();
        $edit = true;
        return view('productores.vinos.form', ['edit' => $edit, 'productor' => $productore, 'vinicolas' => $vinicolas, 'bodegas' => $bodegas]);
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
            'locacion' => "required",
            'telefono' => "required",
            'bodega_id' => "required",
            'vinicola_id' => "required"
        ];
        // dd($productore);
        $this->validate($request, $rules);

        $productore->update($request->all());

        return redirect()->route('productores.vinos.index');
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

        return redirect()->route('productores.vinos.index');
    }

    public function bodega(Productor $id)
    {
        $bodega = $id->bodega;
        // dd($id->bodega);
        return response()->json(['bodega' => $bodega], 201);
    }

    public function barricas(Productor $id)
    {
        $barricas = $id->bodega->barricas;
        return response()->json(['barricas' => $barricas], 201);
    }
    public function vinicola(Productor $id)
    {
        $vinicola = $id->vinicola;
        return response()->json(['vinicola' => $vinicola], 201);
    }
    public function uvas(Productor $id)
    {

        $uvas = $id->vinicola->uvasVin->load('uva');
        // foreach ($uvas as $uvaVin) {
        //     $uvaVin->uva;
        // }
        return response()->json(['uvas' => $uvas], 201);
    }
}
