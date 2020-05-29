@extends('layouts.app2')
@section('content')

<div class="container">

    <h3 class="title text-uppercase text-center m-0">lista de perfiles</h3>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body rounded-0">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <a href="{{route('perfiles.create')}}" class="btn btn-success rounded-0">agregar</a>
                        </div>

                        @if (!isset($perfiles))
                        <div class="col-12 mt-2">
                            <div class="alert alert-info">
                                No has creado ningún perfíl.
                            </div>
                        </div>
                        @else
                        @foreach ($perfiles as $perfil)
                        <div class="col-12 col-md-6 col-lg-4 mt-2">
                            <div class="card rounded-0">
                                <div class="card-header text-uppercase">
                                    <h5 class="m-0">
                                        <span class="align-middle">{{$perfil->nombre}}</span>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @foreach ($secciones as $seccion)
                                    <span class="text-uppercase">{{$seccion->nombre}}</span>
                                    @if ($perfil->secciones()->where('nombre',$seccion->nombre)->first())
                                    <span class="badge badge-pill badge-success float-right text-uppercase">
                                        <h5 class="m-0"><i class="fa fa-check-circle text-white"></i></h5>
                                    </span>
                                    @else
                                    <span class="badge badge-pill badge-danger float-right text-uppercase">
                                        <h5 class="m-0"><i class="fa fa-times-circle text-white"></i></h5>
                                    </span>
                                    @endif
                                    <hr>
                                    @endforeach
                                </div>
                                <div class="card-footer">
                                    <form action="{{route('perfiles.destroy', ['id'=>$perfil->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger text-white float-right ml-2 rounded-0"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                    <a href="{{route('perfiles.edit', ['id'=>$perfil->id])}}"
                                        class="btn btn-warning text-white float-right ml-2 rounded-0"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection