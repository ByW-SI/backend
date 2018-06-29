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
        if ($request->hasFile('logo') && $request->hasFile('vista')) {
            if ($request->hasFile('vista')) {
                
                $path_vista = $request->vista->storeAs('images/bodegas', $request->nombre."Vista.jpg", 'public');
            }
            if ($request->hasFile('logo')) {
                
                $path_logo = $request->logo->storeAs('images/bodegas', $request->nombre."Logo.jpg", 'public');
            }
            $bodega = Bodega::create([
                'nombre'=>$request->nombre,
                'marcas'=>$request->marcas,
                'logo'=>(isset($path_logo) ? $path_logo : NULL),
                'vista'=>(isset($path_vista) ? $path_vista : NULL),
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
                'productora'=>($request->productora ? true : NULL),
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
                'productora'=>($request->productora ? true : NULL),
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
        return view('bodega.form',['edit'=>$edit,'bodega'=>$bodega,'uvas'=>$uvas,'enologos'=>$enologos,'wine_makers'=>$wine_makers]);
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
        $rules=[
            
            'descripcion'=>'required',
            'logo'=>'image|mimes:jpg,jpeg,png',
            'vista'=>'image|mimes:jpg,jpeg,png',
            'locacion'=>'required',
            'telefono'=>'required',
        ];
        $this->validate($request,$rules);
        if ($request->hasFile('logo') || $request->hasFile('vista')) {
            if ($request->hasFile('vista')) {
                
                $path_vista = $request->vista->storeAs('images/bodegas', $bodega->nombre."Vista.jpg", 'public');
            }
            if ($request->hasFile('logo')) {
                
                $path_logo = $request->logo->storeAs('images/bodegas', $bodega->nombre."Logo.jpg", 'public');
            }
            $bodega->update([
                // 'nombre'=>$request->nombre,
                'marcas'=>$request->marcas,
                'logo'=>(isset($path_logo) ? $path_logo : $bodega->logo),
                'vista'=>(isset($path_vista) ? $path_vista : $bodega->vista),
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
                'productora'=>($request->productora ? true : $bodega->productora ),
                'comentarios'=>$request->comentarios
            ]);
        } else {
             $bodega->update([
                // 'nombre'=>$request->nombre,
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
                'productora'=>($request->productora ? true : $bodega->productora ),
                'comentarios'=>$request->comentarios
            ]);
        }

        if ($request->tipo_barrica[0] != "") {
            
            for ($i = 0; $i < sizeof($request->input('tipo_barrica')) ; $i++) {
                BarricaBodega::create([
                    'bodega_id'=>$bodega->id,
                    'tipo'=>$request->tipo_barrica[$i],
                    'subtipo'=>$request->subtipo_barrica[$i],
                    'tostado'=>$request->tostado_barrica[$i],
                    'cantidad'=>$request->cantidad[$i]
                ]);
            }
        }

        if ($request->productora == 'true' && $request->uva[0] !=null) {
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bodega $bodega)
    {
        //
        if ($bodega->productora) {
            foreach ($bodega->uvasBod as $uva) {
                $uva->delete();
            }
        }
        foreach ($bodega->barricas as $barrica) {
            $barrica->delete();
        }
        $bodega->delete();
        return redirect()->route('bodegas.index');
    }
}
