@extends('layouts.app2')
@section('content')
	{{-- expr --}}
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
							<a class="nav-link active" href="{{ route('vinicolas.uvas.index',$vinicola) }}" >Tipo de uvas</a>
						</li>
						<li class="nav-item">
								<a class="nav-link" href="{{ route('vinicolas.barricas.index',$vinicola) }}" >Barricas</a>
							</li>
					</ul>
					<div class="card-body">
						<div class="container-fluid">
							<div class="col-6 input-group input-group-lg mb-3">
								<a href="{{ route('vinicolas.uvas.create',['vinicola'=>$vinicola]) }}" class="btn btn-primary">Nueva Uva/Cosecha</a>
							</div>
							<br>
							<br>
							<table class="table">
									<thead class="thead-dark">
										<tr>
											<th scope="col">Uva</th>
											<th scope="col">Hectareas sembradas</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($uvas as $uva)
											{{-- expr --}}
											<tr>
												<th scope="row">{{$uva->nombre}}</th>
												<th>{{$uva->hectareas}}  <strong>ha</strong></th>
											</tr>
										@empty
											{{-- empty expr --}}
											<span>No hay Uvas</span>
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