@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Enólogo/Wine Maker
					</div>
					
					<div class="card-body">
						<form method="POST" action="{{ $edit == false ? route('enologos.store') : route('enologos.update',['enologo'=>$enologo]) }}">
							@csrf

							@if ($edit == true)
								{{-- expr --}}
								<input type="hidden" name="_method" value="PUT">
							@endif

							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre del enólogo:</label>
								<div class="col-md-6">
									<input id="nombre" type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : ''  }}" name="nombre" value="{{ $edit ? $enologo->nombre : old('nombre') }}" required autofocus="">
									@if ($errors->has('nombre'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("nombre")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="paterno" class="col-md-4 col-form-label text-md-right">Apellido paterno del enólogo/Wine Maker:</label>
								<div class="col-md-6">
									<input id="paterno" type="text" class="form-control {{ $errors->has('paterno') ? ' is-invalid' : ''  }}" name="paterno" value="{{ $edit ? $enologo->paterno : old('paterno') }}" required autofocus="">
									@if ($errors->has('paterno'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("paterno")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="materno" class="col-md-4 col-form-label text-md-right">Apellido materno del enólogo/Wine Maker:</label>
								<div class="col-md-6">
									<input id="materno" type="text" class="form-control {{ $errors->has('materno') ? ' is-invalid' : ''  }}" name="materno" value="{{ $edit ? $enologo->materno : old('materno') }}" autofocus="">
									@if ($errors->has('materno'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("materno")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo:</label>
								<div class="col-md-6">
									<select id="tipo" class="form-control {{ $errors->has('tipo') ? ' is-invalid' : ''  }}" name="tipo" required autofocus="">
										<option value="">Seleccione el tipo</option>
										<option value="Enólogo" @if ($edit && $enologo->tipo == "Enólogo")
											{{-- expr --}}
											selected 
										@endif>Enólogo</option>
										<option value="Wine Maker" @if ($edit && $enologo->tipo == "Wine Maker")
											{{-- expr --}}
											selected 
										@endif>Wine Maker</option>
									</select>
									@if ($errors->has('tipo'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("tipo")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="cv" class="col-md-4 col-form-label text-md-right">C.V.:</label>
								<div class="col-md-6">
									<textarea class="form-control {{$errors->has('cv') ? ' is-invalid' : ''  }}" id="cv" name="cv">{{ $edit ? $enologo->cv : old('cv') }}</textarea>
									@if ($errors->has('cv'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("cv")}}</strong>
										</span>
									@endif
								</div>
							</div>

						<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
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