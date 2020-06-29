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
                        <th scope="col">PRECIO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paquetes as $paquete)
                    <tr>
                        <td scope="row">{{$paquete->id}}</td>
                        <td>{{$paquete->precio}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection