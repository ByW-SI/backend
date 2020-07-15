@extends('layouts.app2')
@section('content')
{{-- expr --}}
<div class="container">
	<div class="col-6">
		<h1>Vinicolas/Ranchos</h1>
	</div>
	<br>
	<div class="col-6">
		<a href="{{ route('vinicolas.create') }}" class="btn btn-primary float-right">
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
			Vinicola/Rancho
		</a>
	</div>
	<br>
	<table class="table shadow-sm">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">tipo</th>
				<th scope="col">Filosofía</th>
				<th scope="col">Locación</th>
				<th scope="col">Uvas</th>
				<th scope="col">Telefono</th>
				<th scope="col">Accion</th>
			</tr>
		</thead>
		<tbody class="bg-white">
			@forelse ($vinicolas as $vinicola)
			{{-- expr --}}
			<tr>
				<th scope="row">{{$vinicola->nombre}}</th>
				<th>{{$vinicola->tipo}}</th>
				<th>{{$vinicola->filosofia}}</th>
				<br>
				<th>
					<a href="{{$vinicola->getMapLink()}}" class="btn btn-primary" target="_blank">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</a>
					{{$vinicola->locacion}}
				</th>
				<th>
					@forelse ($vinicola->uvasVin as $uvaVin)
					{{-- expr --}}
					{{$uvaVin->nombre}} {{$uvaVin->hectarea}} ha
					<form action="{{ route('uvas.destroy',['uvaVin'=>$uvaVin]) }}" method="POST">
						@csrf
						<button type="submit" class="btn btn-link"
							onclick="return confirm('¿Estás seguro que desea eliminar esta uva?');">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</form>

					@empty
					{{-- empty expr --}}
					No tienes uvas
					@endforelse
				</th>
				<th>{{$vinicola->telefono}}</th>
				<th>
					<a class="btn btn-warning" href="{{ route('vinicolas.edit',[$vinicola]) }}">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
					<form action="{{ route('vinicolas.destroy',[$vinicola]) }}" method="POST" style="display: inline">
						<input type="hidden" name="_method" value="DELETE">
						@csrf
						<button type="submit" class="btn btn-danger"
							onclick="return confirm('¿Estás seguro que desea eliminar este {{$vinicola->tipo}}?');">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
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
@endsection