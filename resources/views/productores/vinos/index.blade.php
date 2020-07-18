@extends('layouts.app2')
@section('content')
{{-- expr --}}
<div class="container-fluid">
	<div class="container">
		<div class="col">
			<h1>Productores</h1>
		</div>
		<div class="col-3 input-group input-group-lg mb-3">
			<a href="{{ route('productores.vinos.create') }}" class="btn btn-primary">Agregar Nuevo Productor</a>
		</div>
	</div>
	<br>
	<br>
	<div class="container-fluid">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th nowrap scope="col" style="width: 190px">Nombre</th>
					<th nowrap scope="col">Enologo/Wine Maker</th>
					<th nowrap scope="col">Estado</th>
					<th nowrap scope="col">Nombre empresa</th>
					<th nowrap scope="col">Accion</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($productores as $productor)
				{{-- expr --}}
				<tr>
					<th>{{$productor->nombre_completo}}</th>
					<th>{{$productor->tipo_productor}}</th>
					<th>{{$productor->estado}}</th>
					<th>{{$productor->nombre_empresa ?: 'N/E'}}</th>
					<th>
						<a class="btn btn-default" href="{{ route('productores.vinos.edit',[$productor]) }}">Editar</a>
						<form action="{{ route('productores.vinos.destroy',[$productor]) }}" method="POST">
							<input type="hidden" name="_method" value="DELETE">
							@csrf
							<button type="submit" class="btn btn-link"
								onclick="return confirm('¿Estás seguro que desea eliminar este productor?');">Eliminar</button>
						</form>
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