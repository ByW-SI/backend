@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Empleado
					</div>
					<div class="card-body">
						<form>
							@csrf
							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
								<div class="col-md-6">
									<input type="text" name="nombre" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="paterno" class="col-md-4 col-form-label text-md-right">Apellido Paterno:</label>
								<div class="col-md-6">
									<input type="text" name="paterno" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="materno" class="col-md-4 col-form-label text-md-right">Apellido Materno:</label>
								<div class="col-md-6">
									<input type="text" name="materno" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
								<div class="col-md-6">
									<input type="password" name="nombre" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña:</label>
								<div class="col-md-6">
									<input type="password" name="nombre" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-md-right">Rol:</label>
								<div class="col-md-6">
									<select name="nombre" class="form-control">
										<option>Seleccione una opción</option>
										<option>Ventas</option>
										<option>Gerente</option>
										<option>Representante</option>
									</select>
								</div>
							</div>
							<div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
	                                    Registrar usuario
	                                </button>
	                            </div>
                        	</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection