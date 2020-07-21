@extends('layouts.app2')
@section('content')
{{-- expr --}}

<div class="container">
	<div class="row">

		{{-- 
				=======================
				FORMULARIO DISTRIBUIDOR
				=======================	
			--}}

		<div class="col-12 col-lg-6">
			<div class="card">
				<div class="card-body">
					<form action="{{route('distribuidores.store')}}" method="POST">
						@csrf
						<div class="row">

							{{-- 
								================
								DATOS PERSONALES
								================
								 --}}

							<div class="col-12">
								<h5 class="text-uppercase text-muted mt-2">
									<small>
										Datos personales
									</small>
								</h5>
								<div class="card">
									<div class="card-body">
										<div class="row">
											{{-- NOMBRE EMPRESA --}}
											<div class="col-12 col-lg-6">
												<label for="">Nombre</label>
												<input type="text" class="form-control" name="nombre">
											</div>

											{{-- NOMBRE FECHA INICIO OPERACIONES --}}
											<div class="col-12 col-lg-6">
												<label for="">Apellido paterno</label>
												<input type="text" class="form-control" name="apellido_paterno">
											</div>

											{{-- TELEFONO --}}
											<div class="col-12 col-lg-6">
												<label for="">Apellido materno</label>
												<input type="text" class="form-control" name="apellido_materno">
											</div>

											{{-- TELEFONO --}}
											<div class="col-12 col-lg-6">
												<label for="">Teléfono</label>
												<input type="text" class="form-control" name="celular">
											</div>

											{{-- TELEFONO --}}
											<div class="col-12 col-lg-6">
												<label for="">Correo</label>
												<input type="text" class="form-control" name="correo">
											</div>

										</div>
									</div>
								</div>
							</div>

							{{-- 
								
								--}}


							<div class="col-12 mt-4">
								<h5 class="text-uppercase text-muted mt-2">
									<small>
										Dirección
									</small>
								</h5>
								<div class="card">
									<div class="card-body">
										<div class="row">
											{{-- CALLE --}}
											<div class="col-12 col-lg-6">
												<label for="">Calle</label>
												<input type="text" class="form-control" name="calle">
											</div>
											{{-- NÚMERO EXTERIOR --}}
											<div class="col-12 col-lg-6">
												<label for="">Número exterior</label>
												<input type="text" class="form-control" name="num_exterior">
											</div>
											{{-- NÚMERO EXTERIOR --}}
											<div class="col-12 col-lg-6">
												<label for="">Número interior</label>
												<input type="text" class="form-control" name="num_interior">
											</div>
											{{-- LOCALIDAD --}}
											<div class="col-12 col-lg-6">
												<label for="">Localidad</label>
												<input type="text" class="form-control" name="localidad">
											</div>
											{{-- CIUDAD --}}
											<div class="col-12 col-lg-6">
												<label for="">ciudad</label>
												<input type="text" class="form-control" name="ciudad">
											</div>
											{{-- MUNICIPIO --}}
											<div class="col-12 col-lg-6">
												<label for="">municipio</label>
												<input type="text" class="form-control" name="municipio">
											</div>
											{{-- ESTADO --}}
											<div class="col-12 col-lg-6">
												<label for="">estado</label>
												<input type="text" class="form-control" name="estado">
											</div>
											{{-- CODIGO POSTAL --}}
											<div class="col-12 col-lg-6">
												<label for="">Código postal</label>
												<input type="text" class="form-control" name="codigo_postal">
											</div>
										</div>
									</div>
								</div>
							</div>

							{{-- 
								=============
								DATOS EMPRESA
								=============
								 --}}

							<div class="col-12">
								<h5 class="text-uppercase text-muted mt-2">
									<small>
										Datos de la empresa
									</small>
								</h5>
								<div class="card">
									<div class="card-body">
										<div class="row">
											{{-- NOMBRE EMPRESA --}}
											<div class="col-12 col-lg-6">
												<label for="">Nombre empresa</label>
												<input type="text" class="form-control" name="nombre_empresa">
											</div>

											{{-- NOMBRE FECHA INICIO OPERACIONES --}}
											<div class="col-12 col-lg-6">
												<label for="">Inicio de operaciones</label>
												<input type="date" class="form-control" name="fecha_inicio_operaciones_empresa">
											</div>

											{{-- TELEFONO --}}
											<div class="col-12 col-lg-6">
												<label for="">Teléfono</label>
												<input type="text" class="form-control" name="telefono_empresa">
											</div>

											{{-- SITIO WEB --}}
											<div class="col-12 col-lg-6">
												<label for="">Sitio web</label>
												<input type="text" class="form-control" name="sitio_web_empresa">
											</div>

										</div>
									</div>
								</div>
							</div>

							{{-- 
								=================
								ETIQUETAS DE VINO
								=================
							--}}

							<div class="col-12">
								<h5 class="text-uppercase text-muted mt-2">
									<small>
										Etiquetas de vino
									</small>
								</h5>
								<div class="card">
									<div class="card-body">
										<div class="row" id="contenedorEtiquetas">

											<div class="col-12">
												<button type="button" class="btn btn-primary" id="botonAnadirEtiqueta">
													<i class="fa fa-plus" aria-hidden="true"></i>
												</button>
											</div>

											<div class="col-12 col-lg-12 mt-3">
												<label for="logo" class="">Etiqueta:</label>
												<input type="file" id="logo" name="etiqueta[]" class="file">
											</div>

										</div>
									</div>
								</div>
							</div>

							{{-- 
								=============
								DATOS DEL VINO
								=============
								 --}}

							<div class="col-12">
								<h5 class="text-uppercase text-muted mt-2">
									<small>
										Datos del vino
									</small>
								</h5>
								<div class="card">
									<div class="card-body">
										<div class="row">
											{{-- NOMBRE  --}}
											<div class="col-12 col-lg-6">
												<label for="">Nombre</label>
												<input type="text" class="form-control">
											</div>

											{{-- PRODUCTOR --}}
											<div class="col-12 col-lg-6">
												<label for="">Productor</label>
												<input type="text" class="form-control">
											</div>

											{{-- AÑO --}}
											<div class="col-12 col-lg-6">
												<label for="">Año</label>
												<input type="text" class="form-control">
											</div>

											{{-- UVAS --}}
											<div class="col-12 col-lg-6">
												<label for="">Uvas</label>
												<input type="text" class="form-control">
											</div>

											{{-- PRECIO --}}
											<div class="col-12 col-lg-6">
												<label for="">Precio</label>
												<input type="text" class="form-control">
											</div>

											{{-- DESCRIPCION --}}
											<div class="col-12 col-lg-6">
												<label for="">Descripción</label>
												<input type="text" class="form-control">
											</div>

										</div>
									</div>
								</div>
							</div>

							<hr>

							<div class="col-12 mt-4">
								<div class="d-flex justify-content-end">
									<button class="btn btn-primary" type="submit">
										Guardar distribuidor
									</button>
								</div>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>

		{{-- 
				=================
				FORMULARIO BODEGA
				=================	
			--}}

		<div class="col-12 col-lg-6">
			<div class="card">
				<div class="card-header">
					Bodega
				</div>
				<div class="card-body">
					<form method="POST"
						action="{{ $edit == false ? route('bodegas.store') : route('bodegas.update',['bodega'=>$bodega]) }}"
						enctype="multipart/form-data">
						@csrf

						@if ($edit == true)
						{{-- expr --}}
						<input type="hidden" name="_method" value="PUT">
						@endif

						{{-- nombre --}}
						<div class="form-group row">
							<label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre de la
								bodega:</label>
							<div class="col-md-6">
								<input id="nombre" type="text"
									class="form-control {{ $errors->has('nombre') ? ' is-invalid' : ''  }}"
									name="nombre" value="{{ $edit ? $bodega->nombre : old('nombre') }}"
									{{ $edit ? 'disabled' : "" }} required autofocus="">
								@if ($errors->has('nombre'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("nombre")}}</strong>
								</span>
								@endif
							</div>
						</div>

						{{-- marcas --}}
						<div class="form-group row">
							<label for="marcas" class="col-md-4 col-form-label text-md-right">marcas de la bodega
								(enlistarlas con ,):</label>
							<div class="col-md-6">
								<input id="marcas" type="text"
									class="form-control {{ $errors->has('marcas') ? ' is-invalid' : ''  }}"
									name="marcas" value="{{ $edit ? $bodega->marcas : old('marcas') }}" required
									autofocus="">
								@if ($errors->has('marcas'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("marcas")}}</strong>
								</span>
								@endif
							</div>
						</div>
						{{-- Costo producción --}}
						<div class="form-group row">
							<label for="costo_prod" class="col-md-4 col-form-label text-md-right">Costo de
								producción:</label>
							<div class="col-md-6 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">$</span>
								</div>
								<input id="costo_prod" type="number" step="any" min="0.00"
									class="form-control {{ $errors->has('costo_prod') ? ' is-invalid' : ''  }}"
									name="costo_prod" value="{{ $edit ? $bodega->costo_prod : old('costo_prod') }}"
									required autofocus="">
								<div class="input-group-append">
									<span class="input-group-text">USD</span>
								</div>
								@if ($errors->has('costo_prod'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("costo_prod")}}</strong>
								</span>
								@endif
							</div>
						</div>

						{{-- Logo --}}
						@if ($edit && $bodega->logo != null )
						{{-- expr --}}
						<div class="form-group row">
							<div class="container">
								<img src="{{ url('storage/'.$bodega->logo) }}" style="height: 50px">
							</div>
						</div>
						@endif
						<div class="form-group row">
							<label for="logo" class="col-md-4 col-form-label text-md-right">Logo de la bodega:</label>
							<input type="file" id="logo" name="logo" class="file">
						</div>
						<br>

						{{-- Vista --}}
						@if ($edit && $bodega->vista != null)
						{{-- expr --}}
						<div class="form-group row">
							<div class="container">
								<img src="{{ url('storage/'.$bodega->vista) }}" style="height: 50px">
							</div>
						</div>
						@endif
						<div class="form-group row">
							<label for="vista" class="col-md-4 col-form-label text-md-right">Vista de la bodega:</label>
							<input type="file" id="vista" name="vista" class="file">
						</div>
						<br>

						{{-- descripcion --}}
						<div class="form-group row">
							<label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción:</label>
							<div class="col-md-6">
								<textarea id="descripcion" type="text"
									class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : ''  }}"
									name="descripcion"
									value="{{ $edit ? $bodega->descripcion : old('descripcion') }}">{{ $edit ? $bodega->descripcion : old('descripcion') }}</textarea>
								@if ($errors->has('descripcion'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("descripcion")}}</strong>
								</span>
								@endif
							</div>
						</div>

						{{-- enologo --}}
						<div class="form-group row">
							<label for="enologo_id" class="col-md-4 col-form-label text-md-right">Enólogo:</label>
							<div class="col-md-6">
								<select id="enologo_id"
									class="form-control {{ $errors->has('enologo_id') ? ' is-invalid' : ''  }}"
									name="enologo_id">
									<option value="">Seleccione el enólogo</option>
									@foreach ($enologos as $enologo)
									{{-- expr --}}
									<option value="{{$enologo->id}}" @if ($edit && $bodega->enologo_id == $enologo->id)
										{{-- expr --}}
										selected
										@endif>{{$enologo->nombre}} {{$enologo->paterno}} {{$enologo->materno}}</option>
									@endforeach
								</select>
								@if ($errors->has('enologo_id'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("enologo_id")}}</strong>
								</span>
								@endif

							</div>
						</div>

						{{-- Wine Maker --}}
						<div class="form-group row">
							<label for="wine_maker_id" class="col-md-4 col-form-label text-md-right">Wine Maker:</label>
							<div class="col-md-6">
								<select id="wine_maker_id"
									class="form-control {{ $errors->has('wine_maker_id') ? ' is-invalid' : ''  }}"
									name="wine_maker_id">
									<option value="">Seleccione Wine Maker</option>
									@foreach ($wine_makers as $wine_maker)
									{{-- expr --}}
									<option value="{{$wine_maker->id}}" @if ($edit && $bodega->wine_maker_id ==
										$wine_maker->id)
										{{-- expr --}}
										selected
										@endif>{{$wine_maker->nombre}} {{$wine_maker->paterno}} {{$wine_maker->materno}}
									</option>
									@endforeach
								</select>
								@if ($errors->has('wine_maker_id'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("wine_maker_id")}}</strong>
								</span>
								@endif

							</div>
						</div>


						{{-- locacion, lat,long --}}
						<div class="form-group row">
							<label for="locacion" class="col-md-4 col-form-label text-md-right">Locación del
								bodega:</label>
							<div class="col-md-6">
								<input id="locacion" type="text"
									class="form-control {{ $errors->has('locacion') ? ' is-invalid' : ''  }}"
									name="locacion" value="{{ $edit ? $bodega->locacion : old('locacion') }}" required>
								<input type="hidden" name="lat" id="latitud" value="{{$edit ? $bodega->lat : ''}}">
								<input type="hidden" name="long" id="longitud" value="{{$edit ? $bodega->long : ''}}">
								@if ($errors->has('locacion'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("locacion")}}</strong>
								</span>
								@endif
							</div>
							{{-- <input name="mapinput" id="pac-input" class="form-control" type="text" style="width: 85%;"> --}}
							{{-- <div id="map" style="height: 400px;width: 90%;margin-left: 30px;"></div> --}}
						</div>

						{{-- Contacto --}}
						<div class="form-group row">
							<label for="contacto" class="col-md-4 col-form-label text-md-right">Nombre completo del
								contacto:</label>
							<div class="col-md-6">
								<input id="contacto" type="text"
									class="form-control {{ $errors->has('contacto') ? ' is-invalid' : ''  }}"
									name="contacto" value="{{ $edit ? $bodega->contacto : old('contacto') }}">
								@if ($errors->has('contacto'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("contacto")}}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="puesto" class="col-md-4 col-form-label text-md-right">Puesto del
								contacto:</label>
							<div class="col-md-6">
								<input id="puesto" type="text"
									class="form-control {{ $errors->has('puesto') ? ' is-invalid' : ''  }}"
									name="puesto" value="{{ $edit ? $bodega->puesto : old('puesto') }}">
								@if ($errors->has('puesto'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("puesto")}}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="correo" class="col-md-4 col-form-label text-md-right">Correo electronico del
								contacto:</label>
							<div class="col-md-6">
								<input id="correo" type="email"
									class="form-control {{ $errors->has('correo') ? ' is-invalid' : ''  }}"
									name="correo" value="{{ $edit ? $bodega->correo : old('correo') }}">
								@if ($errors->has('correo'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("correo")}}</strong>
								</span>
								@endif
							</div>
							<label for="celular" class="col-md-4 col-form-label text-md-right">Telefono celular del
								contacto:</label>
							<div class="col-md-6">
								<input id="celular" type="text"
									class="form-control {{ $errors->has('celular') ? ' is-invalid' : ''  }}"
									name="celular" value="{{ $edit ? $bodega->celular : old('celular') }}">
								@if ($errors->has('celular'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("celular")}}</strong>
								</span>
								@endif
							</div>
						</div>
						{{-- Fin Contacto --}}
						{{-- Telefono --}}
						<div class="form-group row">
							<label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono de la
								bodega:</label>
							<div class="col-md-6">
								<input id="telefono" type="text"
									class="form-control {{ $errors->has('telefono') ? ' is-invalid' : ''  }}"
									name="telefono" value="{{ $edit ? $bodega->telefono : old('telefono') }}">
								@if ($errors->has('telefono'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("telefono")}}</strong>
								</span>
								@endif
							</div>
						</div>
						{{-- Comentarios --}}
						<div class="form-group row">
							<label for="comentarios" class="col-md-4 col-form-label text-md-right">Comentarios de la
								bodega:</label>
							<div class="col-md-6">
								<textarea id="comentarios"
									class="form-control {{$errors->has('comentarios') ? ' is-invalid' : ''  }}"
									name="comentarios"
									value="{{ old('comentarios') }}">{{ $edit ? $bodega->comentarios : old('comentarios') }}</textarea>
								@if ($errors->has('comentarios'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("comentarios")}}</strong>
								</span>
								@endif
							</div>
						</div>

						{{-- $barricas --}}
						<div class="form-group row field_wrappers">
							<label for='barricas' class="col-md-4 col-form-label text-md-right">Barrica(s):</label>
							<div class="input-group col-md-8">
								<select id="barrica" class="form-control" {{ $edit ? '' : 'required'}}
									name="tipo_barrica[]">
									<option value="">Seleccione su barrica</option>
									<option value="Americana">Americana</option>
									<option value="Europea">Europea</option>
									<option value="Bosques de europa central">Bosques de europa central</option>
								</select>
								<select id="tostado" class="form-control" name="tostado_barrica[]"
									{{ $edit ? '' : 'required'}}>
									<option value="">Seleccione su tostado de barrica</option>
									<option value="Ligero">Ligero</option>
									<option value="Medio">Medio</option>
									<option value="Alto">Alto</option>
								</select>
								<input type="number" step="1" min="1" placeholder="Cantidad" class="form-control"
									name="cantidad[]" {{ $edit ? '' : 'required'}} value="" />
								<div class="input-group-append">
									<span class="input-group-text"><strong>barrica(s)</strong></span>
								</div>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">$</span>
									</div>
									<input type="number" step="any" min="0.00" placeholder="Costo de la(s) barrica(s)"
										class="form-control" name="costob[]" value="" />
									<div class="input-group-append">
										<span class="input-group-text">USD</span>
									</div>
								</div>
								<a href="javascript:void(0);" class="add_button_barrica" title="Add field"><i
										class="fas fa-plus"></i></a>
							</div>
						</div>


						{{-- ¿Productora? --}}
						<div class="form-group row">
							<label for="nombre" class="col-md-4 col-form-label text-md-right">¿Es productora?:</label>
							<div class="col-md-6">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck1"
										name="productora" value="true" onchange="change(this)" @if ($edit &&
										$bodega->productora == true)
									{{-- expr --}}
									checked
									@endif>
									<label class="custom-control-label" for="customCheck1">Si</label>
								</div>
								@if ($errors->has('nombre'))
								{{-- expr --}}
								<span class="invalid-feedback">
									<strong>{{ $errors->first("nombre")}}</strong>
								</span>
								@endif
							</div>
						</div>
						{{-- uvas --}}
						<div class="form-group row field_wrapper" @if ($edit==false || $bodega->productora== false)
							{{-- expr --}}
							style="display: none;"
							@endif id="uvas">
							<label for='uva' class="col-md-4 col-form-label text-md-right">Uva:</label>
							<div class="input-group col-md-6">
								<select id="uva" class="form-control" name="uva[]">
									<option value="">Seleccione su uva</option>
									@forelse ($uvas as $uva)
									{{-- expr --}}
									<option value="{{$uva->title}}">{{$uva->title}}</option>
									@empty
									{{-- empty expr --}}
									@endforelse
								</select>
								<input type="text" placeholder="Hectareas" class="form-control" name="hectarea[]"
									value="" />
								<div class="input-group-append">
									<span class="input-group-text"><strong>ha</strong></span>
								</div>
								<div class="input-group">
									<input type="number" step="any" min="0.00" placeholder="Porcentaje de la uva"
										class="form-control" name="porcentaje_uva[]" value="" />
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">$</span>
									</div>
									<input type="number" step="any" min="0.00" placeholder="Costo de la uva"
										class="form-control" name="costou[]" value="" />
									<div class="input-group-append">
										<span class="input-group-text">USD</span>
									</div>
								</div>
								<a href="javascript:void(0);" class="add_button" title="Add field"><i
										class="fas fa-plus"></i></a>
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

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">

		</div>
	</div>
</div>
@endsection
@section('script')

<script type="text/javascript">

	$(document).on('click', '#botonAnadirEtiqueta', function(){
		$('#contenedorEtiquetas').append(`
			<div class="col-12 col-lg-12 mt-3">
				<label for="logo" class="">Etiqueta:</label>
				<input type="file" id="logo" name="etiqueta[]" class="file">
			</div>
		`)
	});

	function change(el){
		if(el.checked){
		  	 $("#uvas").show();
		}else{
		    $("#uvas").hide();
		}
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="input-group offset-md-4 col-md-6"> <select id="uva" class="form-control" name="uva[]"><option value="">Seleccione su uva</option>@foreach ($uvas as $uva)<option value="{{$uva->title}}">{{$uva->title}}</option>@endforeach</select><input type="text" placeholder="Hectareas" class="form-control" name="hectarea[]" value=""/><div class="input-group-append"><span class="input-group-text"><strong>ha</strong></span></div><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">$</span></div><input type="number" step="any" min="0.00" placeholder="Costo de la uva" class="form-control" name="costou[]" value=""/><div class="input-group-append"><span class="input-group-text">USD</span></div></div><a href="javascript:void(0);" class="remove_button" title="Add field"><i class="fas fa-minus-circle"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    var addButton_bar = $('.add_button_barrica'); //Add button selector
    var wrappers = $('.field_wrappers'); //Input field
    var barricaHTML = '<div class="input-group offset-md-4 col-md-8"><select id="barrica" class="form-control" name="tipo_barrica[]" required><option value="">Seleccione su barrica</option><option value="Americana">Americana</option><option value="Europea">Europea</option><option value="Bosques de europa central">Bosques de europa central</option></select><select id="tostado" class="form-control" name="tostado_barrica[]" required><option value="">Seleccione su tostado de barrica</option><option value="Ligero">Ligero</option><option value="Medio">Medio</option><option value="Alto">Alto</option></select><input type="number" step="1" min="1" placeholder="Cantidad" class="form-control" name="cantidad[]" required value=""/><div class="input-group-append"><span class="input-group-text"><strong>barrica(s)</strong></span></div><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">$</span></div><input type="number" step="any" min="0.00" placeholder="Costo de la uva" class="form-control" name="costob[]" value=""/><div class="input-group-append"><span class="input-group-text">USD</span></div></div><a href="javascript:void(0);" class="remove_button" title="Add field"><i class="fas fa-minus-circle"></i></a></div>'; 
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    //Once add button is clicked
    $(addButton_bar).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrappers).append(barricaHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    //Once remove button is clicked
    $(wrappers).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
<script>
	var map;
    function loadScript(src,callback){
        var script = document.createElement("script");
        script.type = "text/javascript";
        if(callback)script.onload=callback;
        document.getElementsByTagName("head")[0].appendChild(script);
        script.src = src;
    }
    loadScript('http://maps.googleapis.com/maps/api/js?v=3&sensor=false&callback=initialize&libraries=places&key=AIzaSyDBkjIOXvW9lhje369JKSdGpjoJwTXlBCE',
            function(){/*log('google-loader has been loaded, but not the maps-API ');*/});
    function initialize() 
    {
      //log('maps-API has been loaded, ready to use');
      var mapOptions = {
          zoom: 8,
          center: new google.maps.LatLng(19.390858961426655,-99.14361265000002),
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById('map'),
              mapOptions);
      var marker = new google.maps.Marker({
          map: map,
          draggable:true,
          anchorPoint: new google.maps.Point(0, -29)
      });
      marker.setMap( map );
      var input = /** @type {!HTMLInputElement} */(
              document.getElementById('pac-input'));
      google.maps.event.addDomListener(input, 'keydown', function(e) {
          if (e.keyCode == 13) {
              e.preventDefault();
          }
      });
      google.maps.event.addListener(map, 'click', function(event) {
          marker.setPosition( event.latLng );
          map.panTo( event.latLng );
          var geocoder = geocoder = new google.maps.Geocoder();
          geocoder.geocode({ 'latLng': event.latLng }, function (results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  if (results[0]) {
                      document.getElementById('latitud').value = marker.position.lat();
                      document.getElementById('longitud').value = marker.position.lng();
                      document.getElementById('locacion').value = results[0].formatted_address;
                  }
              }
          });
      });
      var types = document.getElementById('type-selector');
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);

      var infowindow = new google.maps.InfoWindow();

      if(navigator.geolocation) {
          browserSupportFlag = true;
          navigator.geolocation.getCurrentPosition(function(position) {
              initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
              map.setCenter(initialLocation);
              map.setZoom(17);
          }, function() {
              map.setCenter(new google.maps.LatLng(19.390858961426655,-99.14361265000002));
              map.setZoom(17);

          });
      }
      // Browser doesn't support Geolocation
      else {
          browserSupportFlag = false;
          map.setCenter(new google.maps.LatLng(19.390858961426655,-99.14361265000002));
          map.setZoom(17);
      }

      autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
              window.alert("Error");
              return;
          }
          // If the place has a geometry, then present it on a map.

          if (place.geometry.viewport) {
              map.fitBounds(place.geometry.viewport);
          } else {
              map.setCenter(place.geometry.location);
              map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
              url: place.icon,
              size: new google.maps.Size(50, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
              address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
              ].join(' ');
          }
          document.getElementById('locacion').value = address;
          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
          document.getElementById('latitud').value = marker.position.lat();
          document.getElementById('longitud').value = marker.position.lng();
          document.getElementById('locacion').value = address;
      });
    }
</script>


{{-- function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        var infoWindow = new google.maps.InfoWindow({map: map});
        geocoder = new google.maps.Geocoder();
        alert(geocode);
        console.log(geocode);
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      } --}}
{{-- </script> --}}
{{-- <script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBkjIOXvW9lhje369JKSdGpjoJwTXlBCE&callback=initMap">
	</script> --}}
@endsection