@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="container">
			<div class="col">
				<h1>Enologos/Wine Makers</h1>
			</div>
			<div class="col-3 input-group input-group-lg mb-3">
		  		<a href="{{ route('enologos.create') }}" class="btn btn-primary">Agregar Nuevo Enologo/Wine Maker</a>
			</div>
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
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
							<th col="row">{{$enologo->nombre}}</th>
							<th>{{$enologo->paterno}} {{$enologo->materno}}</th>
							<th>{{$enologo->tipo}}</th>
							<th>{{$enologo->cv}}</th>
							<th>
								<a class="btn btn-default" href="{{ route('enologos.edit',[$enologo]) }}">Editar</a>
								<form action="{{ route('enologos.destroy',[$enologo]) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									@csrf
									<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar este enologo?');">Eliminar</button>
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
	</div>
@endsection