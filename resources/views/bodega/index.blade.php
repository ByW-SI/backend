@extends('layouts.app2')
@section('content')
{{-- expr --}}
<div class="container">
	<div class="col-6">
		<h1 class="">Bodegas</h1>
	</div>
	<br>
	<div class="col-6">
		<a href="{{ route('bodegas.create') }}" class="btn btn-primary float-right">
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
			Nueva Bodega
		</a>
	</div>

	<div class="table-responsive">
		<table class="table shadow-sm">
			<thead class="thead-dark">
				<tr>
					<th nowrap>Nombre</th>
					<th nowrap>Marcas</th>
					<th nowrap>Descripción</th>
					<th nowrap>Locación</th>
					<th nowrap>Telefono</th>
					<th nowrap>Barricas</th>
					<th nowrap>Enologo/Wine Maker</th>
					<th nowrap>Acción</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($bodegas as $bodega)
				{{-- expr --}}
				<tr class="bg-white">
					<th>{{$bodega->nombre}}</th>
					<th>{{$bodega->marcas}}</th>
					<th>{{$bodega->descripcion}}</th>
					<th>
						<a href="{{$bodega->getMapLink()}}" class="btn btn-primary" target="_blank">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</a>
						{{$bodega->locacion}}
					</th>
					<th>
						{{$bodega->telefono}}
					</th>
					<th>
						@forelse ($bodega->barricas as $barrica)
						{{-- expr --}}
						{{$barrica->tipo}} {{$barrica->subtipo}} tostado {{$barrica->tostado}} cantidad:
						{{$barrica->cantidad}}
						<form action="{{ route('barrica.destroy',['barrica'=>$barrica]) }}" method="POST">
							@csrf
							<button type="submit" class="btn btn-danger"
								onclick="return confirm('¿Estás seguro que desea eliminar esta barrica?');">Eliminar</button>
						</form>

						@empty
						{{-- empty expr --}}
						N/E
						@endforelse
					</th>
					<th>
						@if ($bodega->enologo_id)
						{{-- expr --}}
						Enólogo: {{$bodega->enologo->nombre}} {{$bodega->enologo->paterno}}
						{{$bodega->enologo->materno}}
						@endif
						<br>
						@if ($bodega->wine_maker_id)
						{{-- expr --}}
						Wine Maker: {{$bodega->wine_maker->nombre}} {{$bodega->wine_maker->paterno}}
						{{$bodega->wine_maker->materno}}
						@endif
					</th>
					<th>
						<a class="btn btn-warning" href="{{ route('bodegas.edit',[$bodega]) }}">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
						<form action="{{ route('bodegas.destroy',[$bodega]) }}" method="POST" style="display:inline">
							<input type="hidden" name="_method" value="DELETE">
							@csrf
							<button type="submit" class="btn btn-danger"
								onclick="return confirm('¿Estás seguro que desea eliminar esta bodega?');">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</button>
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