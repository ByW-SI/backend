@extends('layouts.app2')
@section('content')
{{-- expr --}}
<div class="container-fluid">
	<div class="container">
		<div class="col">
			<h1>Productores de uvas</h1>
		</div>
		<div class="col-3 input-group input-group-lg mb-3">
			<a href="{{ route('productores.uvas.create') }}" class="btn btn-primary">Agregar Nuevo Productor de uvas</a>
		</div>
	</div>
	<br>
	<br>
	<div class="container">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th nowrap scope="col" style="width: 190px">Nombre</th>
					<th nowrap scope="col">Estado</th>
					<th nowrap scope="col">Nombre empresa</th>
					<th nowrap scope="col">Accion</th>
				</tr>
			</thead>
			<tbody class="bg-white">
				@forelse ($productoresUvas as $productor)
				{{-- expr --}}
				<tr>
					<th nowrap>{{$productor->persona->nombre_completo}}</th>
					<th nowrap>{{$productor->persona->direcciones()->first()->estado}}</th>
					<th nowrap>{{$productor->persona->empresa->nombre}}</th>
					<th nowrap>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-warning" href="{{ route('productores.uvas.edit',[$productor]) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('productores.uvas.destroy',[$productor]) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger ml-2"
                                    onclick="return confirm('¿Estás seguro que desea eliminar este productor?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
					</th>
				</tr>
				@empty
				<div class="alert alert-danger" role="alert">
					<span>No hay productores</span>
				</div>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection