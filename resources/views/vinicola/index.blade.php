@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="col-6 input-group input-group-lg mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
		  </div>
		  <input type="text" class="form-control" placeholder="Buscar.." aria-label="Buscar.." aria-describedby="basic-addon1">
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col" style="width: 190px">Nombre del viñedo</th>
						<th scope="col">Año</th>
						<th scope="col" style="width: 500px;">Filosofía</th>
						<th scope="col">Locación</th>
						<th scope="col">Enologo</th>
						<th scope="col">Viñas</th>
						<th scope="col">Telefono</th>
						<th scope="col">Accion</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($vinicolas as $vinicola)
						{{-- expr --}}
						<tr>
							<th scope="row">{{$vinicola->nombre}}</th>
							<th>{{$vinicola->inicio}}</th>
							<th>{{$vinicola->filosofia}}</th>
							<th>{{$vinicola->locacion}}
								<br>
								<a href="{{$vinicola->getMapLink()}}" target="_blank">Ver en Google Maps</a>
							</th>
							<th>{{$vinicola->enologo}}</th>
							<th>@forelse ($vinicola->uvas as $uva)
								{{-- expr --}}
								{{$uva->nombre}}<br>
								@empty
								Sin uvas
							@endforelse</th>
							<th>{{$vinicola->telefono}}</th>
							<th>
								<a href="{{ route('vinicolas.show',['vinicola'=>$vinicola]) }}">Ver/editar</a>
								{{-- <a href="#">Borrar</a> --}}

							</th>
						</tr>
					@empty
						{{-- empty expr --}}
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection