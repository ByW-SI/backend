@extends('layouts.app2')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Vinicola/Bodega	
				</div>
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('vinicolas.show',$vinicola) }}">{{$vinicola->nombre}}</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('vinicolas.marcas.index',$vinicola) }}">Marcas de la bodega</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('vinicolas.uvas.index',$vinicola) }}" >Tipo de uvas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="{{ route('vinicolas.barricas.index',$vinicola) }}" >Barricas</a>
					</li>
				</ul>
				<div class="card-body">
					<div class="container-fluid">
						<div class="col-6input-group input-group-lg mb-3">
							<a href="{{ route('vinicolas.barricas.create',['vinicola'=>$vinicola]) }}" class="btn btn-primary">Nueva Barrica</a>
						</div>
						<br>
						<br>
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Barrica</th>
									<th scope="col">Uva</th>
									<th scope="col">Acción</th>
								</tr>

					
							</thead>
							<tbody>
								@forelse ($barricas as $barrica)
								<tr>
									<th scope="row">{{$barrica->tipo_bar}}</th>
									<th>{{$barrica->uvaVin->uva->title}}</th>
									<th>
										<a href="#" class="btn btn-primary">Modificar</a>
										<a href="#" class="btn btn-primary">Ver</a>
										<a href="#" class="btn btn-primary">Borrar</a>
									</th>
								</tr>
								@empty
								<div class="alert alert-danger" role="alert">
									<span>No hay barricas</span>
								</div>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection