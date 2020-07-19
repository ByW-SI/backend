@extends('layouts.app2')
@section('content')
{{-- expr --}}
<div class="container">
	<div class="col-6">
		<h1>Cursos</h1>
	</div>
	<br>
	<div class="col-6">
		<a href="{{ route('cursos') }}" class="btn btn-primary float-right">
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
			Curso
		</a>
	</div>
	<table class="table shadow-sm">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Apellidos</th>
				<th scope="col">Telefono</th>
				<th scope="col">Correo</th>
				<th scope="col">Acción</th>
			</tr>
		</thead>
		<tbody class="bg-white">
			@forelse ($cursos as $curso)
			{{-- expr --}}
			<tr>
				<th>{{$curso->persona->nombre}}</th>
				<th>{{$curso->persona->apellido_paterno}} {{$curso->persona->apellido_materno}}</th>
				<th>{{$curso->persona->celular}}</th>
				<th>{{$curso->persona->correo}}</th>
                <th>
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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