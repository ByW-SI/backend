<?php

namespace App\Http\Controllers\Web\Oferta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oferta;
use App\Pais;
use App\Productor;
use App\Uva;
use Illuminate\Support\Facades\Storage;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertas = Oferta::get();
        return view('ofertas.index', compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uvas = Uva::get();
        $productores = Productor::get();
        $paises = Pais::orderBy('nombre')->get();
        return view('ofertas.form', compact('uvas', 'productores', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->input());

        $oferta = Oferta::create([
            'nombre_vino' => $request->nombre_vino,
            'uva_id' => $request->uva_id,
            'aniada' => $request->aniada,
            'tipo_vino' => $request->tipo_vino,
            'costo_botella' => $request->costo_botella,
            'porcentaje_transporte' => $request->porcentaje_transporte,
            'porcentaje_utilidad' => $request->porcentaje_utilidad,
            'comentario' => $request->comentario,
            'productor_id' => $request->productor_id,
            'region_id' => $request->region_id
        ]);

        if ($request->uvas_ids != null) {
            for ($i = 0; $i < count($request->uvas_ids); $i++) {
                $oferta->uvas()->attach($request->uvas_ids[$i], [
                    'porcentaje' => $request->porcentajes[$i],
                ]);
            }
        }

        $imagen = $request->file('imagen');
        $extensionImagen = $request->file('imagen')->getClientOriginalExtension();

        $imagenStored = Storage::disk('public')->putFileAs('ofertas', $imagen, $oferta->id . '.' . $extensionImagen);

        $oferta->update([
            'ruta_imagen' => Storage::url($imagenStored)
        ]);

        return redirect()->route('ofertas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Oferta $oferta)
    {
        $uvas = Uva::get();
        $productores = Productor::get();
        $paises = Pais::get();
        return view('ofertas.edit', compact('oferta', 'uvas', 'productores', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oferta $oferta)
    {

        // dd( $request->porcentaje_transporte );

        $oferta->update([
            'nombre_vino' => $request->nombre_vino,
            'uva_id' => $request->uva_id,
            'aniada' => $request->aniada,
            'tipo_vino' => $request->tipo_vino,
            'costo_botella' => $request->costo_botella,
            'porcentaje_transporte' => $request->porcentaje_transporte,
            'porcentaje_utilidad' => $request->porcentaje_utilidad,
        ]);

        if (!$request->hasFile('imagen')) {
            return redirect()->route('ofertas.index');
        }

        $imagen = $request->file('imagen');
        $extensionImagen = $request->file('imagen')->getClientOriginalExtension();

        $imagenStored = Storage::disk('public')->putFileAs('ofertas', $imagen, $oferta->id . '.' . $extensionImagen);

        $oferta->update([
            'ruta_imagen' => Storage::url($imagenStored)
        ]);

        return redirect()->route('ofertas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oferta $oferta)
    {
        $oferta->delete();
        return redirect()->back();
    }
}
