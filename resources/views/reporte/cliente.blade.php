@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="container">
			<div class="col">
				<h1>Clientes</h1>
			</div>
			{{-- <div class="col input-group input-group-lg mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
			  </div>
			  <input type="text" class="col-6 form-control" placeholder="Buscar.." aria-label="Buscar.." aria-describedby="basic-addon1">
			</div>
			 --}}
		</div>
		<div class="container">
			
			<div class="col-6">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-md-right">Edad minima:</label>
					<div class="input-group col-md-6">
						<input type="number" step="1" min="18" value="18" name="edadMin" class="form-control">
						<div class="input-group-append">
							<span class="input-group-text"><strong>años</strong></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-md-right">Edad maxima:</label>
					<div class="input-group col-md-6">
						<input type="number" step="1" min="18" name="edadMin" class="form-control">
						<div class="input-group-append">
							<span class="input-group-text"><strong>años</strong></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-md-right">Sexo:</label>
					<div class="input-group col-md-6">
						<select class="form-control">
							<option>Seleccione una opción</option>
							<option>Hombres</option>
							<option>Mujeres	</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group row">
					<label for="edadMin" class="col-md-4 col-form-label text-md-right">Ubicación:</label>
					<div class="input-group col-md-6">
						<select class="form-control">
							<option>Seleccione una opción</option>
							<option>D.F.</option>
							<option>Resto del pais</option>
						</select>
					</div>
				</div>
			</div>
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
						<th scope="col">Nombre</th>
						<th scope="col">Apellido Paterno</th>
						<th scope="col">Apellido Materno</th>
						<th scope="col">Sexo</th>
						<th scope="col">Edad</th>
						<th scope="col">Ubicación</th>
						<th scope="col">Telefono</th>
						<th scope="col">Ventas</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">Guillermo Iván</th>
						<th>Rojo</th>
						<th>Orea</th>
						<th>Hombre</th>
						<th>25 años</th>
						<th>Ciudad de México</th>
						<th>5521507436</th>
						<th>$5000 USD</th>
					</tr>
					<tr>
						<th scope="row">Javier</th>
						<th>Hernández</th>
						<th>Balcázar</th>
						<th>Hombre</th>
						<th>30 años</th>
						<th>Ciudad de México</th>
						<th>1122334455</th>
						<th>$5000 USD</th>
					</tr>
					<tr>
						<th scope="row">Karla Michelle</th>
						<th>García</th>
						<th>Baez</th>
						<th>Mujer</th>
						<th>24 años</th>
						<th>Ciudad de México</th>
						<th>1122334455</th>
						<th>$50000 USD</th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th scope="row">Total:</th>
						<th>$60000 USD</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection