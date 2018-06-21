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
							<a class="nav-link" href="{{ route('vinicolas.uvas.index',$vinicola) }}" >Tipo de uvas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="{{ route('vinicolas.barricas.index',$vinicola) }}" >Barricas</a>
						</li>
					</ul>
					<div class="card-body">
						<form method="POST" action="{{ $edit ? route('vinicolas.barricas.update',[$vinicola,$barrica]) : route('vinicolas.barricas.store',$vinicola) }}">
							@csrf
							@if ($edit)
								{{-- expr --}}
								<input type="hidden" name="_method" value="PUT">
							@else
								<input type="hidden" name="vinicola_id" value="{{$vinicola->id}}">
							@endif
							<div class="form-group row">
								<label for="tipo_bar" class="col-md-4 col-form-label text-md-right">Barrica:</label>
								<div class="col-md-6">
									<select name="tipo_bar" class="form-control {{ $errors->has('tipo_bar') ? 'is-invalid' : '' }}" value="{{$edit ? $barrica->tipo_bar : old('tipo_bar')}}">
										<option value="">Seleccione el tipo de  barrica</option>
										<option value="Roble Francés">Roble Francés</option>
										<option value="Roble Americano">Roble Americano</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="uva_vinicola"  class="col-md-4 col-form-label text-md-right">Uva:</label>
								<div class="col-md-6">
									<select name="uva_vinicola" class="form-control {{ $errors->has('uva_vinicola') ? 'is-invalid' : '' }}" value="{{$edit ? $barrica->uva_vinicola_id : old('uva_vinicola')}}">
										<option value="">Seleccione el tipo de uva</option>
										@foreach ($uvas_vinicola as $uva_vinicola)
											{{-- expr --}}
											<option value="{{$uva_vinicola->id}}">{{$uva_vinicola->uva->title}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="precio_barrica" class="col-md-4 col-form-label text-md-right">Precio de la barrica:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
  									</div>
  									<input type="number" name="precio_barrica" class="form-control {{ $errors->has('precio_barrica') ? 'is-invalid' : '' }}" min="0" step="0.01"  value="{{$edit ? $barrica->precio_barrica : old('precio_barrica')}}">
  									<div class="input-group-append">
    									<span class="input-group-text">USD</span>
  									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="precio_publico" class="col-md-4 col-form-label text-md-right">Precio al público:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
  									</div>
  									<input type="number" name="precio_publico" class="form-control {{ $errors->has('precio_publico') ? 'is-invalid' : '' }}" min="0" step="0.01"  value="{{$edit ? $barrica->precio_publico : old('precio_publico')}}">
  									<div class="input-group-append">
    									<span class="input-group-text">USD</span>
  									</div>
								</div>
							</div>
							<div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
	                                    Guardar barrica
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