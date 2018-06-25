@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
						Vinicola/Bodega
					</div>
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" href="{{ route('vinicolas.show',$vinicola) }}">{{$vinicola->nombre}}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('vinicolas.marcas.index',$vinicola) }}">Marcas de la bodega</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('vinicolas.uvas.index',$vinicola) }}" >Tipo de uvas</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{ route('vinicolas.barricas.index',$vinicola) }}" >Barricas</a>
						</li>
					</ul>
					<div class="card-body">
						<div class="col-md-12">
							<label class="col-md-4 col-form-label text-md-right">Nombre de la bodega:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->nombre }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-md-4 col-form-label text-md-right">Distinciones:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->distinciones ? $vinicola->distinciones : "Sin distinciones por el momento" }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-md-4 col-form-label text-md-right">Año de inicio:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->inicio }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-md-4 col-form-label text-md-right">Filosofía:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->filosofia }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-md-4 col-form-label text-md-right">Locación de la bodega:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->locacion }}</p>
								<br>
								<a href="{{$vinicola->getMapLink() ? $vinicola->getMapLink() : "#"}}" target="_blank">Ver en mapa</a>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-md-4 col-form-label text-md-right">Enologo:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->enologo }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-md-4 col-form-label text-md-right">Wine Maker:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->wine_maker ? $vinicola->wine_maker : "Esta bodega no tiene Wine Maker." }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label class="col-md-4 col-form-label text-md-right">Nombre completo del contacto:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->contacto ? $vinicola->contacto : "Información no proporcionada" }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label for="puesto" class="col-md-4 col-form-label text-md-right">Puesto del contacto:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->puesto ? $vinicola->puesto : "Información no proporcionada" }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label for="correo" class="col-md-4 col-form-label text-md-right">Correo electronico del contacto:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->correo ? $vinicola->correo : "Información no proporcionada" }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label for="celular" class="col-md-4 col-form-label text-md-right">Telefono celular del contacto:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->celular ? $vinicola->celular : "Información no proporcionada" }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono de la bodega:</label>
							<div class="col-md-6">
								<p>{{ $vinicola->telefono }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<label for="observacion" class="col-md-4 col-form-label text-md-right">Observación de la bodega:</label>
							<div class="col-md-6">
								<p >{{ $vinicola->fecha_observacion ? $vinicola->fecha_observacion : "" }}{{ $vinicola->observaciones ? $vinicola->observaciones : "" }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-4">
								<a href="{{ route('vinicolas.edit',["vinicola"=>$vinicola]) }}" class="btn btn-primary">Editar {{$vinicola->nombre}}</a>
							</div>
							<div class="offset-md-2 col-md-4">
								<a href="{{ route('vinicolas.create') }}" class="btn btn-primary">Nueva Bodega</a>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection