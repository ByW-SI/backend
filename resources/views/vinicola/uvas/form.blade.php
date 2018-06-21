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
						<form method="POST" action="{{ $edit ? route('vinicolas.uvas.update',[$vinicola,$uva]) : route('vinicolas.uvas.store',$vinicola) }}">
							@csrf

							@if ($edit)
								{{-- expr --}}
								<input type="hidden" name="_method" value="PUT">
							@endif
							<input type="hidden" name="vinicola_id" value="{{$vinicola->id}}">
							<div class="form-group row">
								<label for="uva_id" class="col-md-4 col-form-label text-md-right">Tipo de uva:</label>
								<div class="col-md-6">
									<select name="uva_id" class="form-control {{ $errors->has('uva_id') ? 'is-invalid' : '' }}" value="{{$edit ? $uva->uva_id : old('uva_id')}}">
										<option value="">Seleccione la uva</option>
										@foreach ($uvas as $uva)
											{{-- expr --}}
											<option value="{{$uva->id}}">{{$uva->title}}</option>
										@endforeach
									</select>
									@if ($errors->has('uva_id'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("uva_id")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">		
								<label for="hectareas" class="col-md-4 col-form-label text-md-right">Hectareas cosechadas:</label>
								<div class="input-group col-md-6">
									<input type="number" class="form-control {{ $errors->has('hectareas') ? 'is-invalid' : '' }}" name="hectareas" min="0" step="0.01" value="{{$edit ? $uva->hectareas : old('hectareas')}}">
									<div class="input-group-append">
    									<span class="input-group-text"><strong>ha</strong></span>
									</div>
									@if ($errors->has('hectareas'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("hectareas")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
	                                    Guardar cosecha
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