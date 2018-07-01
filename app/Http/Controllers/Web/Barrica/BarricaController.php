<?php

namespace App\Http\Controllers\Web\Barrica;

use App\Barrica;
use App\Productor;
use App\Bodega;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarricaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barricas = Barrica::orderBy('uva','asc')->paginate(5);

        return view('barrica.index',['barricas'=>$barricas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productoras = Productor::orderBy('nombre','asc')->get();
        $bodegas = Bodega::where('productora','1')->orderBy('nombre','asc')->get();
        $edit = false;
        return view('barrica.form',['productoras'=>$productoras,'bodegas'=>$bodegas,'edit'=>$edit]);
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
        // dd($request->all());
        $rule=[
            'producido'=>'required'
        ];
        $this->validate($request,$rule);
        if ($request->producido == "productor") {
            // dd('aquí');
            $rules=[
                'productor'=>'required|integer',
                'barrica'=>'required|integer',
                'uva'=>'required',
                'fecha_inicio'=>'required|date',
                'fecha_embotellado'=>'required|date',
                'precio_uva'=>'required|numeric',
                'precio_venta'=>'required|numeric',
                'precio_prod'=>'required|numeric',
                'anada'=>'required|integer'
            ];
            $this->validate($request,$rules);
            $barrica = Barrica::create([
                'producido_type' => 'App\Productor',
                'producido_id' => $request->productor,
                'barrica_bodega_id'=>$request->barrica,
                'uva'=>$request->uva,
                'fecha_inicio'=>$request->fecha_inicio,
                'fecha_embotellado'=>$request->fecha_embotellado,
                'meses_barrica'=>$request->meses_barrica,
                'meses_estabilizacion'=>$request->meses_estabilizacion,
                'precio_uva'=>$request->precio_uva,
                'precio_prod'=>$request->precio_prod,
                'precio_venta'=>$request->precio_venta,
                'fecha_envio'=>$request->fecha_envio,
                'anada'=>$request->anada
            ]);

        } else {
            $rules=[
                'bodega'=>'required|integer',
                'barrica'=>'required|integer',
                'uva'=>'required',
                'fecha_inicio'=>'required|date',
                'fecha_embotellado'=>'required|date',
                'precio_uva'=>'required|numeric',
                'precio_venta'=>'required|numeric',
                'precio_prod'=>'required|numeric',
                'anada'=>'required|integer'
            ];
            $this->validate($request,$rules);
            $barrica = Barrica::create([
                'producido_type' => 'App\Bodega',
                'producido_id' => $request->bodega,
                'barrica_bodega_id'=>$request->barrica,
                'uva'=>$request->uva,
                'fecha_inicio'=>$request->fecha_inicio,
                'fecha_embotellado'=>$request->fecha_embotellado,
                'meses_barrica'=>$request->meses_barrica,
                'meses_estabilizacion'=>$request->meses_estabilizacion,
                'precio_uva'=>$request->precio_uva,
                'precio_prod'=>$request->precio_prod,
                'precio_venta'=>$request->precio_venta,
                'fecha_envio'=>$request->fecha_envio,
                'anada'=>$request->anada
            ]);
        }
        return redirect()->route('barricas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function show(Barrica $barrica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function edit(Barrica $barrica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barrica $barrica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barrica  $barrica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barrica $barrica)
    {
        //
    }
}
