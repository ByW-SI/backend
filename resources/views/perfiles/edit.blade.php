@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="body">
        <div class="card">
            <div class="card-header">
                <h4 class="m-0 text-center text-uppercase">CREAR PERFIL</h4>
            </div>
            <div class="card-body">
                <form action="{{route('perfiles.update',['id'=>$perfil->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label for="nombre" class="text-uppercase">Nombre del perfil</label>
                            <input type="text" name="nombre" class="form-control" value="{{$perfil->nombre}}" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @if (isset($secciones))
                            @foreach ($secciones as $seccion)
                            <div class="col-12 col-sm-6 col-md-4 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="checkbox" name="secciones[]" value="{{$seccion->nombre}}" {{!$perfil->secciones->contains($seccion) ? : 'checked'}}>
                                        <span class="text-uppercase">{{$seccion->nombre}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">
                                No hay ningúna sección
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success rounded-0 text-uppercase">ACTUALIZAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection