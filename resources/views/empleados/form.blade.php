@extends('layouts.app2')

@section('content')
<div class="container">
    <h4 class="text-center text-muted text-uppercase m-0">Crear usuario</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            {{$errors->first()}}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('empleados.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- INPUT NOMBRE --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                            </div>
                            {{-- INPUT APELLIDO PATERNO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="apellidoPaterno">Apellido paterno</label>
                                    <input type="text" name="apellidoPaterno" class="form-control" required>
                                </div>
                            </div>
                            {{-- INPUT APELLIDO MATERNO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="apellidoMaterno">Apellido materno</label>
                                    <input type="text" name="apellidoMaterno" class="form-control">
                                </div>
                            </div>
                            {{-- INPUT FECHA NACIMIENTO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="nacimiento">Fecha de nacimiento</label>
                                    <input type="date" name="nacimiento" class="form-control">
                                </div>
                            </div>
                            {{-- SEXO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="numero_telefono">Número telefónico</label>
                                    <input type="number" minlength="10" maxlength="10" name="numero_telefono" class="form-control">
                                </div>
                            </div>
                            {{-- CORREO ELECTRONICO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input type="email" name="correo" class="form-control">
                                </div>
                            </div>
                            {{-- INPUT PERFIL --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="curp">Perfil</label>
                                    <select class="form-control" name="perfil_id" required>
                                        <option value="">Seleccionar</option>
                                        @foreach ($perfiles as $perfil)
                                            <option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- INPUT PASSWORD --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="curp">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- BOTÓN PARA GUARDAR --}}
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection