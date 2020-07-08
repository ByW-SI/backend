@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('ofertas.create') }}" class="btn btn-primary">Añadir oferta</a>
            <a href="{{ route('paquetes.create') }}" class="btn btn-primary">Añadir paquete</a>
            <table class="table mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">PRECIO ORIGINAL</th>
                        <th scope="col">PRECIO PUBLICO</th>
                        <th scope="col">BORRAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paquetes as $paquete)
                    <tr>
                        <td scope="row">{{$paquete->id}}</td>
                        <td >{{$paquete->nombre}}</td>
                        <td class="text-danger">${{$paquete->precio_original}} USD</td>
                        <td class="text-success">${{$paquete->precio}} USD</td>
                        <td>
                            <form action="{{route('paquetes.destroy', ['id'=>$paquete])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
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