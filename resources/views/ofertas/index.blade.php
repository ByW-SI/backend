@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOMBRE VINO</th>
                        <th scope="col">UVA</th>
                        <th scope="col">AÑADA</th>
                        <th scope="col">TIPO VINO</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">IMAGEN</th>
                        <th scope="col">ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ofertas as $oferta)
                    <tr>
                        <th scope="row">{{$oferta->id}}</th>
                        <td>{{$oferta->nombre_vino}}</td>
                        <td>{{$oferta->uva->title}}</td>
                        <td>{{$oferta->aniada}}</td>
                        <td>{{$oferta->tipo_vino}}</td>
                        <td>{{$oferta->precio}}</td>
                        <td>
                            <img width="70px" src="{{ asset($oferta->ruta_imagen) }}" alt="">
                        </td>
                        <td>
                            <a href="{{route('ofertas.edit', ['id' => $oferta->id])}}" class="btn btn-warning">EDITAR</a>
                            <form action="{{route('ofertas.destroy', ['id'=>$oferta->id])}}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    ELIMINAR
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection