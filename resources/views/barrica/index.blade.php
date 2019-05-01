@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="container">
			<div class="col">
				<h1>Barricas</h1>
			</div>
			<div class="col-3 input-group input-group-lg mb-3">
		  		<a href="{{ route('barricas.create') }}" class="btn btn-primary">Agregar nueva barrica</a>
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
						<th scope="col" style="width: 100px">Tipo</th>
						<th scope="col">Tostado</th>
						<th scope="col">Uva</th>
						<th scope="col">Productor</th>
						<th scope="col" style="width: 150px">Bodega/Casa</th>
						<th scope="col">Fecha inicio</th>
						<th scope="col">Fecha embotellado(tentativa)</th>
						<th>Costo de la uva</th>
						<th>Costo de la barrica</th>
						<th>Costo de producción</th>
						<th>Costo total:</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($barricas as $barrica)
						{{-- expr --}}
						<tr>
							<th scope="row">					{{$barrica->tipo_bar}}
							</th>
							<th>
								
								{{$barrica->tostado}}
							
							</th>
							<th>
								
								{{$barrica->uva}}
							
							</th>
							<th>{{$barrica->enologo->tipo}} {{$barrica->enologo->nombre}} {{$barrica->enologo->paterno}} {{$barrica->enologo->materno}}</th>
							<th>
								@if (isset($barrica->bodega))
									{{-- true expr --}}
									{{$barrica->bodega->nombre}}
								@else
									{{-- false expr --}}
								@endif
							</th>
							<th>{{$barrica->fecha_inicio}}</th>
							<th>{{$barrica->fecha_embotellado}}</th>
							<th>${{$barrica->costo_uva}} USD</th>
							<th>${{$barrica->costo_barrica}} USD</th>
							<th>${{$barrica->costo_prod}} USD</th>
							<th>${{$barrica->costo_total}} USD</th>
							<th>
								<a class="btn btn-default" href="{{ route('barricas.edit',[$barrica]) }}">Editar</a>
								<a class="btn btn-default" href="{{ route('barricas.procesos.index',[$barrica]) }}">Proceso</a>
								<form action="{{ route('barricas.destroy',[$barrica]) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									@csrf
									<button type="submit" class="btn btn-link" onclick="return confirm('¿Estás seguro que desea eliminar este barrica?');">Eliminar</button>
								</form>
							</th>
						</tr>
					@empty
						{{-- empty expr --}}
						<div class="alert alert-danger" role="alert">
							<span>No hay barricas</span>
						</div>
					@endforelse
				</tbody>
			</table>
			<div>
				{{$barricas->links()}}
			</div>
		</div>
	</div>
@endsection