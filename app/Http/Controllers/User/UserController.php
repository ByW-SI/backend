<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        // return $usuario;
        return response()->json([ 'usuarios'=>$usuarios], 200);
        // return $this->showAll($usuarios);
    }

    // /**
    //  * Show the form for login a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function login(Request $request)
    // {
    //     //
    //     // return response()->json([$request->all()],400);
    //     $data = $request->all();
    //     // $data['password'] = bcrypt($data->password);
    //     $usuario = User::where(function($query)use($data){
    //         $query->where('email',$data['email']);
    //     })->first();
    //     // dd($usuario->password);
    //     // $hashpass = Hash::make($data['password']);
    //     if ($usuario) {
    //         if(Hash::check($data['password'], $usuario->password))
    //         {
    //             return response()->json(['usuario'=>$usuario],200);
    //         }
    //         else{
    //             return response()->json(['failed'=>'Contraseña invalida'], 200);
    //         }
    //     }
    //     else{
    //         return response()->json(['failed'=>'El usuario no existe'], 200);
            
    //     }
    //     // dd($usuario);
    // }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json([$request->all()],200);
        $rules =[
            'nombre' => 'required',
            'email' => 'required|email|unique:users',
            // 'username'=> 'required|unique:users',
            'password' => 'required|min:6',
        ];

        $validater = $request->validate($rules);
        // dd($validater);
        // $this->validate($request,$rules);
        $campos = $request->all();
        $campos['password']= bcrypt($request->password);
        // $campos['verified']=User::USUARIO_NO_VERIFICADO;
        // $campos['admin'] =User::USUARIO_REGULAR;
        // $campos['verification_token'] = User::generarVerificationToken();
        $usuario = User::create([
            "name"  => $campos['nombre'],
            "appaterno" => $campos['apaterno'],
            "apmaterno" => $campos['amaterno'],
            "nacimiento" => $campos['fechanac'],
            "numero_telefono" => $campos['telefono'],
            "email" => $campos['email'],
            "password" => $campos['password']
        ]);
        if ($usuario){
            return response()->json(['usuario'=>$usuario], 200);
        }
        else{
            return response()->json(['message'=>'Error al crear usuario'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        if ($usuario) {
            return response()->json(['usuario'=>$usuario],200);
            // return $this->showOne($usuario);
        }
        else{
            return response()->json(['messenger'=>'El usuario no existe'], 404);
        }
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $rules = [
            'email'=> 'email|unique:users,email,' . $usuario->id,
            // 'username'=> 'required|unique:users',
            'password'=> 'min:6|confirmed',
            
        ];

        $this->validate($request, $rules);

        if ($request->has('name')) {
            $usuario->name = $request->name;
        }

        if ($request->has('email') && $usuario->email != $request->email){
            // $usuario->verified = User::USUARIO_NO_VERIFICADO;
            // $usuario->verification_token = User::generarVerificationToken();
            $usuario->email = $request->email;
        }
        if ($request->has('password')) {
            $usuario->password = bcrypt($request->password);
        }
        // if ($request->has('admin')) {
        //     if(!$usuario->esVerificado()){
        //         // return $this->errorResponse('Error al Actualizar. Se necesita ser Administrador para actualizar', 409);
        //         response()->json(['message'=>'Error al actualizar', 'codigo'=>409],409);
        //     }
        //     else{
        //         $usuario->admin = $request->admin;
        //     }
        // }
        // var_dump($usuario);
        if (!$usuario->isDirty()) {
            // return $this->errorResponse('Error. Se debe de especificar al menos un valor diferente para actualizar', 422);
          return response()->json(['message'=>'Error. Se debe de especificar al menos un valor diferente para actualizar', 'code'=>422], 422);
        }

        $usuario->save();
        // return $this->showOne($usuario);
        return response()->json(['usuario'=>$usuario],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        
        $usuario->delete($usuario);

        // return $this->showOne($usuario);
        return response()->json(['usuario'=>$usuario],200);
    }
    public function verify($token){
        $user = User::where('verification_token', $token)->firstOrFail();
        // $user->verified = User::USUARIO_VERIFICADO;
        // $user->verification_token = null;
        $user->save();
        // return $this->successResponse('La cuenta ha sido verificada',200);
        return response()->json(['message'=>'La cuenta ha sido verificada'], 200);
    }
    public function resend(User $user){
        if ($user->esVerificado()) {
            return $this->errorResponse('Este usuario ya ha sido verificado', 409);
        }
        else{
            retry(5, function() use ($user){
                Mail::to($user)->send(new UserCreated($user));
            },100);
            return response()->json(['message'=>'El correo de verificación se ha reenviado'],200);
        }

    }
    public function getUser (Request $request) {
        return $request->user();
    }

    public function changePassword(Request $request){
        $user = $request->user();
        $data = $request->all();
        if(Hash::check($data['password'], $user->password)){
            
            $rules= [
                'password_new'=> 'required|min:6|confirmed',
            ];
            $this->validate($request, $rules);
            $user->password = bcrypt($data['password_new']);
            $user->save();
            return response()->json(['message'=>"Tu contraseña a sido actualizada"],200);
        }
        else{
            return response()->json(["error"=>"Tu contraseña no es correcta."],401);
            
        }

    }

}
