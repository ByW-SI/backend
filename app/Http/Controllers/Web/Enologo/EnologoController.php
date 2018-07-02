<?php

namespace App\Http\Controllers\Web\Enologo;

use App\Enologo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $enologos= Enologo::paginate(15);
        return view('enologo.index',['enologos'=>$enologos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $edit= false;
        return view('enologo.form',['edit'=>$edit]);
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
            'nombre'=>'required',
            'paterno'=>"required",
            'tipo'=>'required',
            'cv'=>"required"
        ];
        $this->validate($request,$rules);
        $enologo=Enologo::create($request->all());
        return redirect()->route('enologos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enologo  $enologo
     * @return \Illuminate\Http\Response
     */
    public function show(Enologo $enologo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enologo  $enologo
     * @return \Illuminate\Http\Response
     */
    public function edit(Enologo $enologo)
    {
        //
        // dd($enologo);
         $edit= true;
        return view('enologo.form',['edit'=>$edit,'enologo'=>$enologo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enologo  $enologo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enologo $enologo)
    {
        //
        $rules = [
            'nombre'=>'required',
            'paterno'=>"required",
            'tipo'=>'required',
            'cv'=>"required"
        ];
        $this->validate($request,$rules);
        $enologo->update($request->all());
        return redirect()->route('enologos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enologo  $enologo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enologo $enologo)
    {
        //
        $enologo->delete();
        return redirect()->route('enologos.index');

    }

    public function enologos()
    {
        $enologos = Enologo::where('tipo','Enólogo')->get();
        return response()->json(['enologos'=>$enologos],201);
    }

    public function wine()
    {
        $wine_makers = Enologo::where('tipo','Wine Maker')->get();
        return response()->json(['wine_makers'=>$wine_makers],201);
    }
}
