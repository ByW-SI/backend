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
							<a class="nav-link active" href="#">Nueva bodega</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#" onclick="disabled('marcas')">Marcas de la bodega</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#" onclick="disabled('uvas')">Tipo de uvas</a>
						</li>
					</ul>
					<div class="card-body">
						<form method="POST" action="{{ $edit == true ? route('vinicolas.store') : route('vinicolas.update',$vinicola) }}">
							@csrf

							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre de la bodega:</label>
								<div class="col-md-6">
									<input id="nombre" type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : ''  }}" name="nombre" value="{{ old('nombre') }}" required autofocus="">
									@if ($errors->has('nombre'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("nombre")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="distinciones" class="col-md-4 col-form-label text-md-right">Distinciones:</label>
								<div class="col-md-6">
									<textarea id="distinciones" type="text" class="form-control {{ $errors->has('distinciones') ? ' is-invalid' : ''  }}" name="distinciones" value="{{ old('distinciones') }}" ></textarea>
									@if ($errors->has('distinciones'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("distinciones")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="inicio" class="col-md-4 col-form-label text-md-right">Año de inicio:</label>
								<div class="col-md-6">
									<input id="inicio" type="number" min="1500" max="{{date("Y")}}" class="form-control {{ $errors->has('inicio') ? ' is-invalid' : ''  }}" name="inicio" value="{{ old('inicio') }}" required>
									@if ($errors->has('inicio'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("inicio")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">		
								<label for="filosofia" class="col-md-4 col-form-label text-md-right">Filosofía:</label>
								<div class="col-md-6">
									<textarea id="filosofia" type="text" class="form-control {{ $errors->has('filosofia') ? ' is-invalid' : ''  }}" name="filosofia" value="{{ old('filosofia') }}" required></textarea>
									@if ($errors->has('filosofia'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("filosofia")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="locacion" class="col-md-4 col-form-label text-md-right">Locación del viñedo:</label>
								<div class="col-md-6">
									<input id="locacion" type="text" class="form-control {{ $errors->has('locacion') ? ' is-invalid' : ''  }}" name="locacion" value="{{ old('locacion') }}" required>
									@if ($errors->has('locacion'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("locacion")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="enologo" class="col-md-4 col-form-label text-md-right">Enologo:</label>
								<div class="col-md-6">
									<input id="enologo" type="text" class="form-control {{ $errors->has('enologo') ? ' is-invalid' : ''  }}" name="enologo" value="{{ old('enologo') }}" required>
									@if ($errors->has('enologo'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("enologo")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="wine_maker" class="col-md-4 col-form-label text-md-right">Wine Maker:</label>
								<div class="col-md-6">
									<input id="wine_maker" type="text" class="form-control {{ $errors->has('wine_maker') ? ' is-invalid' : ''  }}" name="wine_maker" value="{{ old('wine_maker') }}">
									@if ($errors->has('wine_maker'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("wine_maker")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="vinas" class="col-md-4 col-form-label text-md-right">Viñas:</label>
								<div class="col-md-6">
									<input id="vinas" type="text" class="form-control {{ $errors->has('vinas') ? ' is-invalid' : ''  }}" name="vinas" value="{{ old('vinas') }}">
									@if ($errors->has('vinas'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("vinas")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="contacto" class="col-md-4 col-form-label text-md-right">Nombre completo del contacto:</label>
								<div class="col-md-6">
									<input id="contacto" type="text" class="form-control {{ $errors->has('contacto') ? ' is-invalid' : ''  }}" name="contacto" value="{{ old('contacto') }}">
									@if ($errors->has('contacto'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("contacto")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="puesto" class="col-md-4 col-form-label text-md-right">Puesto del contacto:</label>
								<div class="col-md-6">
									<input id="puesto" type="text" class="form-control {{ $errors->has('puesto') ? ' is-invalid' : ''  }}" name="puesto" value="{{ old('puesto') }}">
									@if ($errors->has('puesto'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("puesto")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="correo" class="col-md-4 col-form-label text-md-right">Correo electronico del contacto:</label>
								<div class="col-md-6">
									<input id="correo" type="text" class="form-control {{ $errors->has('correo') ? ' is-invalid' : ''  }}" name="correo" value="{{ old('correo') }}">
									@if ($errors->has('correo'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("correo")}}</strong>
										</span>
									@endif
								</div>
								<label for="celular" class="col-md-4 col-form-label text-md-right">Telefono celular del contacto:</label>
								<div class="col-md-6">
									<input id="celular" type="text" class="form-control {{ $errors->has('celular') ? ' is-invalid' : ''  }}" name="celular" value="{{ old('celular') }}">
									@if ($errors->has('celular'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("celular")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono de la bodega:</label>
								<div class="col-md-6">
									<input id="telefono" type="text" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : ''  }}" name="telefono" value="{{ old('telefono') }}">
									@if ($errors->has('telefono'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("telefono")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="observacion" class="col-md-4 col-form-label text-md-right">Calificación del viñedo:</label>
								<div class="col-md-6">
									<input type="date" class="form-control {{$errors->has('fecha_observacion') ? ' is-invalid' : ''  }}" name="fecha_observacion" value="{{old('fecha_observacion')}}" style="margin-bottom: 3px;">
									@if ($errors->has('observacion'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("observacion")}}</strong>
										</span>
									@endif
									<textarea id="observacion" class="form-control {{$errors->has('observacion') ? ' is-invalid' : ''  }}" name="observacion" value="{{ old('observacion') }}"></textarea>
									@if ($errors->has('observacion'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("observacion")}}</strong>
										</span>
									@endif
								</div>
							</div>

						<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar bodega
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
@section('script')
	{{-- expr --}}
	<script type="text/javascript">
		function disabled(text) {
			// body...
			alert("Por favor registrar la bodega antes de agregar las "+text);
		}
	</script>
@endsection