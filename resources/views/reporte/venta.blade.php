@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="container">
			<div class="col">
				<h1>Ventas</h1>
			</div>
		</div>
		<div class="container">
			<div class="col-4">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-center">Uva:</label>
					<div class="input-group col-md-8">
						<select class="form-control">
							<option>Seleccione una opción</option>
							@foreach ($uvas as $uva)
								{{-- expr --}}
								<option>{{$uva->title}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-center">Vinicola:</label>
					<div class="input-group col-md-8">
						<select class="form-control">
							<option>Seleccione una opción</option>
							@foreach ($productores as $vinicola)
								{{-- expr --}}
								<option>{{$vinicola->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-center">Cliente:</label>
					<div class="input-group col-md-8">
						<select class="form-control">
							<option>Seleccione una opción</option>
							@foreach ($usuarios as $user)
								{{-- expr --}}
								<option>{{$user->name.' '.$user->appaterno.' '.$user->apmaterno}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-md-right">Fecha inicial:</label>
					<div class="input-group col-md-6">
						<input type="date" id="minimo" min="{{date('Y-m-d')}}" onchange="document.getElementById('maximo').min=this.value;" name="edadMin" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-md-right">Fecha final:</label>
					<div class="input-group col-md-6">
						<input type="date" id="maximo"  min="document.getElementById('minimo').value" name="edadMin" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>
			<div class=" col form-group row mb-0">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Buscar
                    </button>
                </div>
            </div>
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Uva</th>
						<th scope="col">Vinicola</th>
						<th scope="col">Barricas</th>
						<th scope="col">Botellas</th>
						<th scope="col">Botellas vendidas</th>
						<th scope="col">Precio por botella</th>
						<th scope="col">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">Barbera</th>
						<th>Aborigen</th>
						<th>2</th>
						<th>560</th>
						<th>500</th>
						<th>$150 USD</th>
						<th>$75000 USD</th>
					</tr>
					<tr>
						<th scope="row">Cabernet Franc</th>
						<th>Adobe Guadalupe</th>
						<th>2</th>
						<th>560</th>
						<th>480</th>
						<th>$20 USD</th>
						<th>$10000 USD</th>
					</tr>
					<tr>
						<th scope="row">Merlot</th>
						<th>Aborigen</th>
						<th>5</th>
						<th>1400</th>
						<th>1385</th>
						<th>$30 USD</th>
						<th>$41550 USD</th>
						
					</tr>
					<tr>
						<th scope="row">Petit Verdot</th>
						<th>Adobe Guadalupe</th>
						<th>5</th>
						<th>1400</th>
						<th>100</th>
						<th>$25 USD</th>
						<th>$2500 USD</th>
					</tr>
					<tr>
						<th scope="row">Syrah</th>
						<th>Aborigen</th>
						<th>5</th>
						<th>1400</th>
						<th>852</th>
						<th>$50</th>
						<th>$42600 USD</th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th scope="row">Total:</th>
						<th>$171650 USD</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection