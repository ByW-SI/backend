@extends('layouts.app2')

@section('content')

<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="title text-uppercase">lista de usuarios</h5>
                </div>
                <div class="card-body">
                    <a href="{{route('empleados.create')}}" class="btn btn-success rounded-0">agregar</a>
                    <br><br>
                    <div class="row">
                        <div class="col-12">
                            {{-- Tabla de usuarios --}}
                            <table class="table table-bordered table-striped" id="tablaUsuarios">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Perfil</th>
                                        <th class="text-center" scope="col">Usuario</th>
                                        {{-- <th class="text-center" scope="col">Apellido paterno</th> --}}
                                        <th class="text-center" scope="col">Correo</th>
                                        <th class="text-center">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                    <tr class="text-center">
                                        <td>{{$usuario->perfil->nombre}}</td>
                                        <td>{{ $usuario->name }}</td>
                                        {{-- <td>{{ $usuario->empleado()->first()->apellido_paterno }}</td> --}}
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            <form action="{{route('empleados.destroy', ['id'=>$usuario->id])}}"
                                                method="POST" class="form-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-0 mr-3">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                <a href="{{route('empleados.edit', ['id'=>$usuario->id])}}"
                                                    class="btn btn-warning rounded-0">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection