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
							<a class="nav-link active" href="{{ route('vinicolas.marcas.index',$vinicola) }}">Marcas de la bodega</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" >Tipo de uvas</a>
						</li>
					</ul>
					<div class="card-body">
						<div class="container-fluid">
							{{-- <div class="col-6 input-group input-group-lg mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
							  </div>
							  <input type="text" class="form-control" placeholder="Buscar.." aria-label="Buscar.." aria-describedby="basic-addon1">
							</div> --}}
							<div class="col-6 input-group input-group-lg mb-3">
								<a href="{{ route('vinicolas.marcas.create',['vinicola'=>$vinicola]) }}" class="btn btn-primary">Nueva Marca</a>
							</div>
							<br>
							<br>
							<table class="table">
								<thead class="thead-dark">
									<tr>
										<th scope="col">Nombre de la marca</th>
										<th scope="col">Descripción</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($marcas as $marca)
										{{-- expr --}}
										<tr>
											<th scope="row">{{$marca->nombre}}</th>
											<th>{{$marca->descripcion}}</th>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection