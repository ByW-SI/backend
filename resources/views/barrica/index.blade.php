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
						<th scope="col">Subtipo</th>
						<th scope="col">Tostado</th>
						<th scope="col">Uva</th>
						<th scope="col" style="width: 250px">Productor</th>
						<th scope="col">Fecha inicio</th>
						<th scope="col">Fecha embotellado(tentativa)</th>
						<th>Precio de la uva</th>
						<th>Precio de producción</th>
						<th>Precio venta</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($barricas as $barrica)
						{{-- expr --}}
						<tr>
							<th scope="row"></th>
						</tr>
					@empty
						{{-- empty expr --}}
						<div class="alert alert-danger" role="alert">
							<span>No hay barricas</span>
						</div>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection