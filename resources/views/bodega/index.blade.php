@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="container">
			<div class="col">
				<h1>Bodegas</h1>
			</div>
			<div class="col-3 input-group input-group-lg mb-3">
		  		<a href="{{ route('bodegas.create') }}" class="btn btn-primary">Agregar Nueva Bodega</a>
			</div>
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col" style="width: 190px">Nombre</th>
						<th scope="col">Marcas</th>
						<th scope="col" style="width: 500px;">Descripción</th>
						<th scope="col">Locación/Telefono</th>
						<th scope="col">Barricas/Uvas</th>
						<th scope="col">Enologo/Wine Maker</th>
						<th scope="col">Accion</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($bodegas as $bodega)
						{{-- expr --}}
						<tr>
							<th scope="row">{{$bodega->nombre}}</th>
							<th>{{$bodega->marcas}}</th>
							<th>{{$bodega->descripcion}}</th>
							<th>{{$bodega->locacion}}
								<br>
								Telefono: {{$bodega->telefono}}
								<a href="{{$bodega->getMapLink()}}" target="_blank">Ver en Google Maps</a>
							</th>
							<th>
								@forelse ($bodega->uvasBod as $uvaBod)
									{{-- expr --}}
									{{$uvaBod->uva['title']}} {{$uvaBod->hectarea}} ha
									<form action="{{ route('uvas.destroy',['uvaBod'=>$uvaBod]) }}" method="POST">
										@csrf
										<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar esta uva?');">Eliminar</button>
									</form>
								
								@empty
									{{-- empty expr --}}
									No tienes uvas
								@endforelse
								@forelse ($bodega->barricas as $barrica)
									{{-- expr --}}
									{{$barrica->tipo}} {{$barrica->subtipo}} tostado {{$barrica->tostado}} cantidad: {{$barrica->cantidad}}
									<form action="{{ route('barrica.destroy',['barrica'=>$barrica]) }}" method="POST">
										@csrf
										<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar esta barrica?');">Eliminar</button>
									</form>

								@empty
									{{-- empty expr --}}
									No tiene barrica
								@endforelse
							</th>
							<th>
								@if ($bodega->enologo_id)
									{{-- expr --}}
									Enólogo: {{$bodega->enologo->nombre}} {{$bodega->enologo->paterno}} {{$bodega->enologo->materno}}
								@endif
								<br>
								@if ($bodega->wine_maker_id)
									{{-- expr --}}
									Wine Maker: {{$bodega->wine_maker->nombre}} {{$bodega->wine_maker->paterno}} {{$bodega->wine_maker->materno}}
								@endif
							</th>
							<th>
								<a class="btn btn-default" href="{{ route('bodegas.edit',[$bodega]) }}">Editar</a>
								<form action="{{ route('bodegas.destroy',[$bodega]) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									@csrf
									<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar esta bodega?');">Eliminar</button>
								</form>
							</th>
						</tr>
					@empty
						<div class="alert alert-danger" role="alert">
							<span>No hay bodegas</span>
						</div>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection