<?php

namespace App\Http\Controllers\Web\Uva;

use App\Uva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uvas = Uva::paginate(5);
        return view('uvas.index',['uvas'=>$uvas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $edit = false;
        return view('uvas.form',['edit'=>$edit]);
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
        // dd($request->image['-originalName']);
        $rules = [
            'title'=>'required|unique:uvas',
            'image'=>'required',
        ];
        $this->validate($request, $rules);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //
            // dd("valido");

            $path = $request->image->storeAs('images', $request->title.".jpg", 'public');
            $uva = Uva::create([
                'title'=> $request->title,
                'subtitle'=>$request->subtitle,
                'image' => "storage/$path",
                'olfato' => $request->olfato,
                'gusto'=>$request->gusto,
                'vista'=>$request->vista,
                'maridaje'=>$request->maridaje
            ]);
            return redirect()->route('uvas.index');
            // dd($path);
        }
        else{
            dd("invalid");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uva  $uva
     * @return \Illuminate\Http\Response
     */
    public function show(Uva $uva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Uva  $uva
     * @return \Illuminate\Http\Response
     */
    public function edit(Uva $uva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uva  $uva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uva $uva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uva  $uva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uva $uva)
    {
        //
    }
}
