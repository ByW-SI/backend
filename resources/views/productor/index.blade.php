@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="container">
			<div class="col">
				<h1>Productores</h1>
			</div>
			<div class="col-3 input-group input-group-lg mb-3">
		  		<a href="{{ route('productores.create') }}" class="btn btn-primary">Agregar Nuevo Productor</a>
			</div>
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th nowrap scope="col" style="width: 190px">Nombre</th>
						<th nowrap scope="col">Vinicola y Bodega</th>
						<th nowrap scope="col" style="width: 500px;">Descripción</th>
						<th nowrap scope="col">Locación/Telefono</th>
						<th nowrap scope="col">Barricas/Uvas</th>
						<th nowrap scope="col">Enologo/Wine Maker</th>
						<th nowrap scope="col">Accion</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($productores as $productor)
						{{-- expr --}}
						<tr>
							<th scope="row">{{$productor->nombre}}</th>
							<th>
								{{$productor->vinicola->nombre}}
								<br>
								{{$productor->bodega->nombre}}
							</th>
							<th>{{$productor->descripcion}}</th>
							<th>{{$productor->locacion}}
								<br>
								Telefono: {{$productor->telefono}}
								<a href="{{$productor->getMapLink()}}" target="_blank">Ver en Google Maps</a>
							</th>
							<th>
								@forelse ($productor->bodega->uvasBod as $uvaBod)
									{{-- expr --}}
									Uvas en bodega:
									{{$uvaBod->uva['title']}} {{$uvaBod->hectarea}} ha
									<form action="{{ route('uvas.destroy',['uvaBod'=>$uvaBod]) }}" method="POST">
										@csrf
										<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar esta uva?');">Eliminar</button>
									</form>
								
								@empty
									{{-- empty expr --}}
									No tienes uvas en bodegas
									<br>
								@endforelse
								@forelse ($productor->vinicola->uvasVin as $uvaVin)
									{{-- expr --}}
									Uvas en vinicola:
									{{$uvaVin->uva['title']}} {{$uvaVin->hectarea}} ha
									<form action="{{ route('uvas.destroy',['uvaVin'=>$uvaVin]) }}" method="POST">
										@csrf
										<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar esta uva?');">Eliminar</button>
									</form>
								@empty
									{{-- empty expr --}}
									no tienes uvas en vinicola/rancho
									<br>
								@endforelse
								@forelse ($productor->bodega->barricas as $barrica)
									{{-- expr --}}
									Barricas en bodega:
									{{$barrica->tipo}} {{$barrica->subtipo}} tostado {{$barrica->tostado}} cantidad: {{$barrica->cantidad}}
									<form action="{{ route('barrica.destroy',['barrica'=>$barrica]) }}" method="POST">
										@csrf
										<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar esta barrica?');">Eliminar</button>
									</form>

								@empty
									{{-- empty expr --}}
									No tiene barrica
									<br>
								@endforelse
							</th>
							<th>
								@if ($productor->bodega->enologo_id)
									{{-- expr --}}
									Enólogo: {{$productor->bodega->enologo->nombre}} {{$productor->bodega->enologo->paterno}} {{$productor->bodega->enologo->materno}}
								@endif
								<br>
								@if ($productor->bodega->wine_maker_id)
									{{-- expr --}}
									Wine Maker: {{$productor->bodega->wine_maker->nombre}} {{$productor->bodega->wine_maker->paterno}} {{$productor->bodega->wine_maker->materno}}
								@endif
							</th>
							<th>
								<a class="btn btn-default" href="{{ route('productores.edit',[$productor]) }}">Editar</a>
								<form action="{{ route('productores.destroy',[$productor]) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									@csrf
									<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar este productor?');">Eliminar</button>
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