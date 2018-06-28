@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="container">
			<div class="col">
				<h1>Vinicolas/Ranchos</h1>
			</div>
			<div class="col-3 input-group input-group-lg mb-3">
		  		<a href="{{ route('vinicolas.create') }}" class="btn btn-primary">Agregar Nuevo Vinicola/Rancho</a>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col" style="width: 190px">Nombre</th>
						<th scope="col">tipo</th>
						<th scope="col" style="width: 500px;">Filosofía</th>
						<th scope="col">Locación</th>
						<th scope="col">Uvas</th>
						<th scope="col">Telefono</th>
						<th scope="col">Accion</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($vinicolas as $vinicola)
						{{-- expr --}}
						<tr>
							<th scope="row">{{$vinicola->nombre}}</th>
							<th>{{$vinicola->tipo}}</th>
							<th>{{$vinicola->filosofia}}</th>
							<th>{{$vinicola->locacion}}
								<br>
								<a href="{{$vinicola->getMapLink()}}" target="_blank">Ver en Google Maps</a>
							</th>
							<th></th>
							<th>{{$vinicola->telefono}}</th>
							<th>
								<a class="btn btn-default" href="{{ route('vinicolas.edit',[$vinicola]) }}">Editar</a>
								<form action="{{ route('vinicolas.destroy',[$vinicola]) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									@csrf
									<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar este {{$vinicola->tipo}}?');">Eliminar</button>
								</form>
							</th>
						</tr>
					@empty
						<div class="alert alert-danger" role="alert">
							<span>No hay vinicolas/ranchos</span>
						</div>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection