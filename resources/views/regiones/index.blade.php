@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Crear región
            </button>

            <table class="table mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">País</th>
                        <th scope="col">Región</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($regiones as $region)
                    <tr>
                        <th scope="row">{{$region->id}}</th>
                        <td>{{$region->pais->nombre}}</td>
                        <td>{{$region->nombre}}</td>
                        <td>
                            <form action="{{route('regiones.destroy')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear región</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('regiones.store')}}" method="POST">
                <div class="modal-body">
                    <div class="row">
                        @csrf
                        <div class="col-12">
                            <label for="" class="text-uppercase text-muted">
                                País
                            </label>
                            <select name="pais_id" id="" class="form-control">
                                <option value="">Seleccionar</option>
                                @foreach ($paises as $pais)
                                <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="" class="text-uppercase text-muted">Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection