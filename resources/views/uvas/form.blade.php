@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						{{$edit ? $uva->title : "Nueva uva"}}
					</div>
					<div class="card-body">
						<form method="POST" enctype="multipart/form-data" action="{{ $edit ? route('uvas.update',['uva'=>$uva]) : route('uvas.store') }}">
							@csrf
							{{-- {{dd($uva)}} --}}
							@if ($edit)
								<input type="hidden" name="_method" value="PUT">
							@endif
							<div class="form-group row">
								<label for="title" class="col-md-4 col-form-label text-md-right">Nombre de la uva:</label>
								<div class="col-md-6">
									<input class="form-control {{ $errors->has('title') ? ' is-invalid' : ''  }}" id="title" {{$edit ? 'disabled' : ""}} type="text" name="title" value="{{ $edit ? $uva->title : old('title') }}" required>
									@if ($errors->has('title'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("title")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="subtitle" class="col-md-4 col-form-label text-md-right">Otros nombres (si tiene):</label>
								<div class="col-md-6">
									<input class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : ''  }}" id="subtitle" type="text" name="subtitle" value="{{ $edit ? $uva->subtitle : old('subtitle') }}">
									@if ($errors->has('subtitle'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("subtitle")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="olfato" class="col-md-4 col-form-label text-md-right">¿Cómo es al olfato?:</label>
								<div class="col-md-6">
									<textarea class="form-control {{ $errors->has('olfato') ? ' is-invalid' : ''  }}" id="olfato" name="olfato">{{$edit ? $uva->olfato : old('olfato')}}</textarea>
									@if ($errors->has('olfato'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("olfato")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="gusto" class="col-md-4 col-form-label text-md-right">¿Cómo es al gusto?:</label>
								<div class="col-md-6">
									<textarea class="form-control {{ $errors->has('gusto') ? ' is-invalid' : ''  }}" id="gusto" name="gusto">{{$edit ? $uva->gusto : old('gusto')}}</textarea>
									@if ($errors->has('gusto'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("gusto")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="vista" class="col-md-4 col-form-label text-md-right">¿Cómo es a la vista?:</label>
								<div class="col-md-6">
									<textarea class="form-control {{ $errors->has('vista') ? ' is-invalid' : ''  }}" id="vista" name="vista">{{$edit ? $uva->vista : old('vista')}}</textarea>
									@if ($errors->has('vista'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("vista")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="maridaje" class="col-md-4 col-form-label text-md-right">Maridaje perfecto:</label>
								<div class="col-md-6">
									<textarea class="form-control {{ $errors->has('maridaje') ? ' is-invalid' : ''  }}" id="maridaje" name="maridaje">{{$edit ? $uva->maridaje : old('maridaje')}}</textarea>
									@if ($errors->has('maridaje'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("maridaje")}}</strong>
										</span>
									@endif
								</div>
							</div>
							@if ($edit)
								{{-- expr --}}
							<div class="form-group row">
								<div class="container">
									<img src="{{ url($uva->image) }}" >
								</div>
							</div>
							@endif
							<div class="form-group row">
								<label for="image" class="col-md-4 col-form-label text-md-right">Imagen de la uva:</label>
								<input type="file" id="image" name="image" class="file">
							</div>
							<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
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