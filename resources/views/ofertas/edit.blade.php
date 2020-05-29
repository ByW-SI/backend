@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{route('ofertas.update', ['id'=>$oferta->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <p class="text-monospace pl-2">Sujeto a disponibilidad, no incluye gastos de envío.</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
    
                    {{-- LEFT --}}
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <label for="" class="text-uppercase text-muted">Nombre del vino</label>
                                <input value="{{$oferta->nombre_vino}}" type="text" class="form-control" name="nombre_vino" placeholder="Nombre del vino">
                            </div>
                            <div class="col-12 mt-2">
                                <label for="" class="text-uppercase text-muted">Tipo de uva</label>
                                <select name="uva_id" id="" class="form-control" required>
                                    <option value="">Seleccionar</option>
                                    @foreach ($uvas as $uva)
                                    <option value="{{$uva->id}}" {{$oferta->uva_id == $uva->id ? 'selected' : ''}}>{{$uva->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="" class="text-uppercase text-muted">Añada</label>
                                <input value="{{$oferta->aniada}}" name="aniada" type="number" class="form-control" required value="0">
                            </div>
                            <div class="col-12 mt-2">
                                <label for="" class="text-uppercase text-muted">Tipo de vino</label>
                                <select name="tipo_vino" id="" class="form-control" required>
                                    <option value="">Seleccionar</option>
                                    <option value="tinto" {{$oferta->tipo_vino == 'tinto' ? 'selected' : ''}}>tinto</option>
                                    <option value="rosado" {{$oferta->tipo_vino == 'rosado' ? 'selected' : ''}}>rosado</option>
                                    <option value="blanco" {{$oferta->tipo_vino == 'blanco' ? 'selected' : ''}}>blanco</option>
                                    <option value="postre" {{$oferta->tipo_vino == 'postre' ? 'selected' : ''}}>postre</option>
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="" class="text-uppercase text-muted">Precio</label>
                                <input value="{{$oferta->precio}}" step="any" name="precio" type="number" class="form-control" min="0" value="0">
                            </div>
                        </div>
                    </div>
    
                    {{-- RIGHT --}}
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <label for="logo" class="text-uppercase text-muted">Imagen:</label>
                                <input type="file" id="logo" name="imagen" class="file">
                            </div>
                        </div>
                    </div>
    
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <button class="btn btn-success rounded-0 p-3 float-right"><small>GUARDAR</small></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection