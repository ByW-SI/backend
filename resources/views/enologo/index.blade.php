@extends('layouts.app2')
@section('content')
{{-- expr --}}
<div class="container">
	<div class="col-6">
		<h1>Enologos/Wine Makers</h1>
	</div>
	<br>
	<div class="col-6">
		<a href="{{ route('enologos.create') }}" class="btn btn-primary float-right">
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
			Enologo/Wine Maker
		</a>
	</div>
	<table class="table shadow-sm">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Apellidos</th>
				<th scope="col">tipo</th>
				<th scope="col">cv</th>
				<th scope="col">Acción</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($enologos as $enologo)
			{{-- expr --}}
			<tr>
				<th>{{$enologo->nombre}}</th>
				<th>{{$enologo->paterno}} {{$enologo->materno}}</th>
				<th>{{$enologo->tipo}}</th>
				<th>{{$enologo->cv}}</th>
				<th>
					<a class="btn btn-warning" href="{{ route('enologos.edit',[$enologo]) }}">
						<i class="fa fa-pencil-square" aria-hidden="true"></i>
					</a>
					<form action="{{ route('enologos.destroy',[$enologo]) }}" method="POST" style="display:inline">
						<input type="hidden" name="_method" value="DELETE">
						@csrf
						<button type="submit" class="btn btn-danger"
							onclick="return confirm('¿Estás seguro que desea eliminar este enologo?');">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</form>
				</th>

			</tr>
			@empty
			{{-- empty expr --}}
			<div class="alert alert-danger" role="alert">
				<span>No hay enologos</span>
			</div>
			@endforelse
		</tbody>
	</table>
</div>
@endsection