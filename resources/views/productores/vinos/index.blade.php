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
	<div class="container">
		<table class="table shadow-sm">
			<thead class="thead-dark">
				<tr>
					<th nowrap scope="col" style="width: 190px">Nombre</th>
					<th nowrap scope="col">Enologo/Wine Maker</th>
					<th nowrap scope="col">Estado</th>
					<th nowrap scope="col">Nombre empresa</th>
					<th nowrap scope="col">Accion</th>
				</tr>
			</thead>
			<tbody class="bg-white">
				@forelse ($productores as $productor)
				{{-- expr --}}
				<tr>
					<td nowrap>{{$productor->nombre_completo}}</td>
					<td nowrap>{{$productor->tipo_productor}}</td>
					<td nowrap>{{$productor->estado}}</td>
					<td nowrap>{{$productor->nombre_empresa ?: 'N/E'}}</td>
					<td nowrap>
						<div class="d-flex justify-content-center">
							<a class="btn btn-warning" href="{{ route('productores.vinos.edit',[$productor]) }}">
								<i class="fa fa-pencil"></i>
							</a>
							<form action="{{ route('productores.vinos.destroy',[$productor]) }}" method="POST">
								<input type="hidden" name="_method" value="DELETE">
								@csrf
								<button type="submit" class="btn btn-danger ml-3"
									onclick="return confirm('¿Estás seguro que desea eliminar este productor?');">
									<i class="fa fa-danger"></i>
								</button>
							</form>
						</div>
					</td>
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