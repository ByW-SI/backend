@extends('layouts.app2')
@section('content')
{{-- expr --}}
<div class="container">
	<div class="col-6">
		<h1>Enoturistas</h1>
	</div>
	<br>
	<div class="col-6">
		<a href="{{ route('enoturistas.create') }}" class="btn btn-primary float-right">
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
			Enoturista
		</a>
	</div>
	<table class="table shadow-sm">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Apellidos</th>
				<th scope="col">Teléfono</th>
				<th scope="col">Acción</th>
			</tr>
		</thead>
		<tbody class="bg-white">
			@foreach ($enoturistas as $enoturista)
			{{-- expr --}}
			<tr>
				<th>{{$enoturista->persona->nombre}}</th>
                <th>{{$enoturista->persona->apellido_paterno}} {{$enoturista->persona->apellido_materno}}</th>
                <th>{{$enoturista->persona->celular}}</th>
				<th>
                    <a href="{{route('enoturistas.edit', ['enoturista'=>$enoturista])}}" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </th>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection