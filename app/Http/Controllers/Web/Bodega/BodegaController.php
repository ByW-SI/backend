<?php

namespace App\Http\Controllers\Web\Bodega;

use App\Bodega;
use App\Uva;
use App\Enologo;
use App\BarricaBodega;
use App\UvaProducida;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bodegas= Bodega::orderBy('nombre','asc')->paginate(5);
        
        return view('bodega.index',['bodegas'=>$bodegas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $edit=false;
        $uvas= Uva::orderBy('title','asc')->get();
        $enologos=Enologo::where('tipo','Enólogo')->orderBy('nombre','asc')->get();
        $wine_makers=Enologo::where('tipo','Wine Maker')->orderBy('nombre','asc')->get();
        return view('bodega.form',['edit'=>$edit,'uvas'=>$uvas,'enologos'=>$enologos,'wine_makers'=>$wine_makers]);
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
        $rules=[
            'nombre'=>'required|unique:bodega',
            'descripcion'=>'required',
            'logo'=>'image|mimes:jpg,jpeg,png',
            'vista'=>'image|mimes:jpg,jpeg,png',
            'locacion'=>'required',
            'telefono'=>'required',
        ];
        $this->validate($request,$rules);
        if ($request->hasFile('logo') && $request->hasFile('vista') && $request->file('logo')->isValid() && $request->file('vista')->isValid()) {
            $path_logo = $request->logo->storeAs('images/bodegas', $request->nombre."Logo.jpg", 'public');
            $path_logo = $request->vista->storeAs('images/bodegas', $request->nombre."Vista.jpg", 'public');
            $bodega = Bodega::create([
                'nombre'=>$request->nombre,
                'marcas'=>$request->marcas,
                'logo'=>$path_logo,
                'vista'=>$path_logo,
                'descripcion'=>$request->descripcion,
                'locacion'=>$request->locacion,
                'long'=>$request->long,
                'lat'=>$request->lat,
                'enologo_id'=>$request->enologo_id,
                'wine_maker_id'=>$request->wine_maker_id,
                'contacto'=>$request->contacto,
                'puesto'=>$request->puesto,
                'correo'=>$request->correo,
                'celular'=>$request->celular,
                'telefono'=>$request->telefono,
                'productora'=>($request->productora ? true : ''),
                'comentarios'=>$request->comentarios
            ]);
        } else {
             $bodega = Bodega::create([
                'nombre'=>$request->nombre,
                'marcas'=>$request->marcas,
                'descripcion'=>$request->descripcion,
                'locacion'=>$request->locacion,
                'long'=>$request->long,
                'lat'=>$request->lat,
                'enologo_id'=>$request->enologo_id,
                'wine_maker_id'=>$request->wine_maker_id,
                'contacto'=>$request->contacto,
                'puesto'=>$request->puesto,
                'correo'=>$request->correo,
                'celular'=>$request->celular,
                'telefono'=>$request->telefono,
                'productora'=>$request->productora,
                'comentarios'=>$request->comentarios
            ]);
        }

        for ($i = 0; $i < sizeof($request->input('tipo_barrica')) ; $i++) {
            BarricaBodega::create([
                'bodega_id'=>$bodega->id,
                'tipo'=>$request->tipo_barrica[$i],
                'subtipo'=>$request->subtipo_barrica[$i],
                'tostado'=>$request->tostado_barrica[$i],
                'cantidad'=>$request->cantidad[$i]
            ]);
        }

        if ($request->productora == 'true') {
            for ($i = 0; $i < sizeof($request->input('uva')) ; $i++) {
                UvaProducida::create([
                    'producidas_id'=>$bodega->id,
                    'producidas_type'=>"App\Bodega",
                    'uva_id'=>$request->uva[$i],
                    'hectarea'=>$request->hectarea[$i]
                ]);
                
            }
        }

        return redirect()->route('bodegas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function show(Bodega $bodega)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function edit(Bodega $bodega)
    {
        $edit=true;
        $uvas= Uva::orderBy('title','asc')->get();
        $enologos=Enologo::where('tipo','Enólogo')->orderBy('nombre','asc')->get();
        $wine_makers=Enologo::where('tipo','Wine Maker')->orderBy('nombre','asc')->get();
        return view('bodega.form',['edit'=>$edit,'uvas'=>$uvas,'enologos'=>$enologos,'wine_makers'=>$wine_makers]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodega $bodega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bodega $bodega)
    {
        //
    }
}
