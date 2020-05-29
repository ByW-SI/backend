@extends('layouts.app2')
@section('content')
{{-- expr --}}
<div class="container-fluid">
	<div class="col-6 input-group input-group-lg mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
		</div>
		<input type="text" class="form-control" placeholder="Buscar.." aria-label="Buscar.."
			aria-describedby="basic-addon1">
	</div>
	<br>
	<br>
	<div class="container-fluid">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Rol</th>
					<th scope="col">Accion</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">Guillermo Iván Rojo Orea</th>
					<th>Programador</th>
					<th>
						<a class="btn btn-primary" href="#">Ver/editar</a>
						<a class="btn btn-primary" href="#">Borrar</a>

					</th>
				</tr>

				<tr>
					<th scope="row">Rebeka Keeling</th>
					<th>Ventas</th>
					<th>
						<a class="btn btn-primary" href="#">Ver/editar</a>
						<a class="btn btn-primary" href="#">Borrar</a>

					</th>
				</tr>
				<tr>
					<th scope="row">Ada Ward</th>
					<th>Ventas</th>
					<th>
						<a class="btn btn-primary" href="#">Ver/editar</a>
						<a class="btn btn-primary" href="#">Borrar</a>

					</th>
				</tr>


			</tbody>
		</table>
	</div>
</div>
@endsection