@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-uppercase text-muted mt-0">Editar usuario</h4>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            {{$errors->first()}}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('empleados.update',['id' => $usuario->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            {{-- INPUT NOMBRE --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{$usuario->name}}" required>
                                </div>
                            </div>
                            {{-- INPUT APELLIDO PATERNO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="apellido_paterno">Apellido paterno</label>
                                    <input type="text" name="apellido_paterno" value="{{$usuario->appaterno}}" class="form-control" required>
                                </div>
                            </div>
                            {{-- INPUT APELLIDO MATERNO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="apellidoMaterno">Apellido materno</label>
                                    <input type="text" name="apellido_materno" value="{{$usuario->apmaterno}}" class="form-control">
                                </div>
                            </div>
                            {{-- INPUT FECHA NACIMIENTO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="nacimiento">Fecha de nacimiento</label>
                                    <input type="date" name="nacimiento" value="{{$usuario->nacimiento}}" class="form-control">
                                </div>
                            </div>
                            {{-- CORREO ELECTRONICO --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input type="email" name="correo" value="{{$usuario->email}}" class="form-control">
                                </div>
                            </div>
                            {{-- TELEFONO --}}
                            <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="number" name="telefono" value="{{$usuario->numero_telefono}}" class="form-control">
                                    </div>
                                </div>
                            {{-- INPUT PERFIL --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="curp">Perfil</label>
                                    <select class="form-control" name="perfil_id" required>
                                        <option value="">Seleccionar</option>
                                        @foreach ($perfiles as $perfil)
                                            <option value="{{$perfil->id}}" {{$perfil->id == $usuario->perfil_id ? 'selected' : ''}}>{{$perfil->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- INPUT PASSWORD --}}
                            {{-- <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="">¿Cambiar contraseña?</label>
                                    <select id="inputModificarContrasena" class="form-control">
                                        <option value="0" selected>No</option>
                                        <option value="1">Sí</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-12 col-md-4" style="display: none;" id="contenedorInputContrasena">
                                <div class="form-group">
                                    <label for="curp">Password</label>
                                    <input type="password" name="password" value="" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- BOTÓN PARA GUARDAR --}}
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success rounded-0">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.js')}}"></script>
<script>

$(document).ready( function(){

    $(document).on('change','#inputModificarContrasena', function(){

        modificarContrasena = $('#inputModificarContrasena').val();

        modificarContrasena == 1 ? $('#contenedorInputContrasena').show('slow') : $('#contenedorInputContrasena').hide('slow');

    });

} );

</script>

@endsection