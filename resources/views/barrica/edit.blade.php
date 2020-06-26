@extends('layouts.app2')
@section('content')
{{-- expr --}}


<div class="container">

	<form method="POST" action="{{ route('barricas.update', [$barrica]) }}">
        @csrf
        @method('PUT')

		<div class="card">
			<div class="card-body">

				{{-- DATOS GENERALES --}}

				<div class="col-12">

					<div class="card">
						<div class="card-body">
							<div class="row">

								{{--  --}}

								<div class="col-12 col-md-4">
									<label for="producido" class="text-uppercase text-muted">Tipo de
										productor:</label>
									<select id="producido"
										class="form-control {{ $errors->has('producido') ? ' is-invalid' : ''  }}"
										name="producido" required>
										<option value="">Seleccione una opción</option>
										<option value="Wine Maker" {{ $barrica->enologo->tipo == 'Wine Maker' ? 'selected' : '' }} >Wine Maker</option>
										<option value="Enólogo" {{ $barrica->enologo->tipo == 'Enólogo' ? 'selected' : '' }} >Enólogo</option>
									</select>
									@if ($errors->has('producido'))
									{{-- expr --}}
									<span class="invalid-feedback">
										<strong>{{ $errors->first("producido")}}</strong>
									</span>
									@endif
								</div>

								{{--  --}}

								<div class="col-12 col-md-4">
									<label for="productor" class="text-uppercase text-muted">Productor:</label>
									<select id="productor"
										class="form-control {{ $errors->has('productor') ? ' is-invalid' : ''  }}"
                                        name="productor" required>
                                        <option value="{{ $barrica->enologo_id ?: '' }}">{{ $barrica->enologo_id ? $barrica->enologo->nombre_completo : 'Seleccione una opción' }}</option>
										{{-- <option value="">Seleccione una opción</option> --}}

									</select>
									@if ($errors->has('productor'))
									{{-- expr --}}
									<span class="invalid-feedback">
										<strong>{{ $errors->first("productor")}}</strong>
									</span>
									@endif
								</div>

								{{--  --}}

								<div class="col-12 col-md-4">
									<label for="tipo_bar" class="text-muted text-uppercase">Tipo de
										barrica:</label>
									<select id="tipo_bar"
										class="form-control {{ $errors->has('tipo_bar') ? ' is-invalid' : ''  }}"
										name="tipo_bar" required>
										<option value="">Seleccione su barrica</option>
										<option value="Europeo" {{ $barrica->tipo_bar == "Europeo" ? "selected" : "" }}>Europeo</option>
										<option value="Americana" {{ $barrica->tipo_bar == "Americana" ? "selected" : "" }}>Americana</option>
										<option value="Bosques de europa central" {{ $barrica->tipo_bar == "Bosques de europa central" ? "selected" : "" }}>Bosques de europa central</option>
									</select>
									@if ($errors->has('tipo_bar'))
									{{-- expr --}}
									<span class="invalid-feedback">
										<strong>{{ $errors->first("tipo_bar")}}</strong>
									</span>
									@endif
								</div>

								{{--  --}}

								<div class="col-12 col-md-4">
									<label for="tostado" class="text-uppercase text-muted">Tostado de
										barrica:</label>
									<select id="tostado"
										class="form-control {{ $errors->has('tostado') ? ' is-invalid' : ''  }}"
										name="tostado" required>
										<option value="">Seleccione su tostado</option>
										<option value="Ligero" {{ $barrica->tostado == "Ligero" ? "selected" : "" }}>Ligero</option>
										<option value="Medio" {{ $barrica->tostado == "Medio" ? "selected" : "" }}>Medio</option>
										<option value="Alto" {{ $barrica->tostado == "Alto" ? "selected" : "" }}>Alto</option>
									</select>
									@if ($errors->has('tostado'))
									{{-- expr --}}
									<span class="invalid-feedback">
										<strong>{{ $errors->first("tostado")}}</strong>
									</span>
									@endif
								</div>

								{{--  --}}

								<div class="col-12 col-md-4">
									<label for="bodega_id" class="text-uppercase text-muted">Bodega:</label>
									<select id="bodega_id"
										class="form-control {{ $errors->has('bodega_id') ? ' is-invalid' : ''  }}"
										name="bodega_id" required>
										<option value="">Seleccione su bodega</option>
										@foreach ($bodegas as $bodega)
										{{-- expr --}}
										<option value="{{$bodega->id}}" {{$barrica->bodega_id == $bodega->id ? "selected" : ""}}>{{$bodega->nombre}}</option>
										@endforeach
									</select>
									@if ($errors->has('bodega_id'))
									{{-- expr --}}
									<span class="invalid-feedback">
										<strong>{{ $errors->first("bodega_id")}}</strong>
									</span>
									@endif
								</div>

								{{--  --}}

								<div class="col-12 col-md-4">
									<label for="uva" class="text-uppercase text-muted">Uva:</label>
									<select id="uva"
										class="form-control {{ $errors->has('uva') ? ' is-invalid' : ''  }}" name="uva"
										required>
										<option value="">Seleccione su uva</option>
										@foreach ($uvas as $uva)
										{{-- expr --}}
										<option value="{{$uva->title}}" {{$barrica->uva == $uva->title ? "selected" : ""}}>{{$uva->title}}</option>
										@endforeach
									</select>
									@if ($errors->has('uva'))
									{{-- expr --}}
									<span class="invalid-feedback">
										<strong>{{ $errors->first("uva")}}</strong>
									</span>
									@endif
								</div>

								{{--  --}}

								<div class="col-12 col-md-4">
									<label for="vinicola_id" class="text-uppercase text-muted">Vinicola o
										rancho:</label>
									<select id="vinicola_id"
										class="form-control {{ $errors->has('vinicola_id') ? ' is-invalid' : ''  }}"
										name="vinicola_id" required>
										<option value="">Seleccione su vinicola</option>
										@foreach ($vinicolas as $vinicola)
										{{-- expr --}}
										<option value="{{$vinicola->id}}" {{ $barrica->vinicola_id == $vinicola->id ? "selected" : "" }}>{{$vinicola->tipo}} {{$vinicola->nombre}}
										</option>
										@endforeach
									</select>
									@if ($errors->has('uva'))
									{{-- expr --}}
									<span class="invalid-feedback">
										<strong>{{ $errors->first("uva")}}</strong>
									</span>
									@endif
								</div>								

								{{-- añada --}}

								<div class="col-12 col-md-4">

									<div class="form-group">
										<label for="anada" class="text-center text-uppercase">Añada:</label>
										<div class="input-group">
											<input type="number"
												class="form-control {{ $errors->has('anada') ? 'is-invalid' : '' }}"
												name="anada" min="{{date('Y')}}" step="1"
												value="{{$edit ? $barrica->anada : old('anada')}}" required>
											<div class="input-group-append">
												<span class="input-group-text"><strong>año</strong></span>
											</div>
											@if ($errors->has('anada'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("anada")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{--  --}}

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="fecha_inicio" class="text-uppercase text-muted">Fecha de
											inicio:</label>
										<div class="input-group">
											<input type="date" id="fecha_inicio" min="{{date('Y-m-d')}}"
												class="form-control {{ $errors->has('fecha_inicio') ? ' is-invalid' : ''  }}"
												name="fecha_inicio" value="{{ $barrica->fecha_inicio }}" required>
											@if ($errors->has('fecha_inicio'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("fecha_inicio")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{--  --}}

								{{-- meses barricas --}}
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="meses_barrica" class="text-uppercase text-muted">Meses en
											barrica:</label>
										<div class="input-group">
											<input type="number" id="meses_barrica"
												class="form-control {{ $errors->has('meses_barrica') ? 'is-invalid' : '' }}"
												name="meses_barrica" min="0" step="6" value="{{ $barrica->meses_barrica }}" required>
											<div class="input-group-append">
												<span class="input-group-text"><strong>meses</strong></span>
											</div>
											@if ($errors->has('meses_barrica'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("meses_barrica")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- fecha embotellado --}}
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="fecha_embotellado" class="text-muted text-uppercase">Fecha
											de embotellado:</label>
										<div class="input-group">
											<input type="date" id="fecha_embotellado" min="{{date('Y-m-d')}}"
												class="form-control {{ $errors->has('fecha_embotellado') ? ' is-invalid' : ''  }}"
												name="fecha_embotellado" value="{{ $barrica->fecha_embotellado }}" required>
											@if ($errors->has('fecha_embotellado'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("fecha_embotellado")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- meses estabilizacion --}}
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="meses_estabilizacion" class="text-muted text-uppercase">Meses
											en estabilización:</label>
										<div class="input-group">
											<input type="number"
												class="form-control {{ $errors->has('meses_estabilizacion') ? 'is-invalid' : '' }}"
												id="meses_estabilizacion" name="meses_estabilizacion" min="0" step="1"
												value="{{$edit ? $barrica->meses_estabilizacion : old('meses_estabilizacion')}}" required>
											<div class="input-group-append">
												<span class="input-group-text"><strong>meses</strong></span>
											</div>
											@if ($errors->has('meses_estabilizacion'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("meses_estabilizacion")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- fecha envios --}}
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="fecha_envio" class="text-uppercase text-muted">Fecha
											tentativa
											envio:</label>
										<div class="input-group">
											<input type="date" id="fecha_envio" min="{{date('Y-m-d')}}"
												class="form-control {{ $errors->has('fecha_envio') ? ' is-invalid' : ''  }}"
												name="fecha_envio" value="{{$barrica->fecha_envio}}" required>
											@if ($errors->has('fecha_envio'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("fecha_envio")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>


				</div>

				{{-- SUBTOTAL VINO --}}

				<div class="col-12 col-md-6">
					<small class="text-uppercase text-muted">COSTO DEL VINO (BARRICA)</small>
					<div class="card">
						<div class="card-body">
							<div class="row">

								{{-- INPUT COSTO UVA --}}

								<div class="col-12">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">Costo uva</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number"
												class="form-control {{ $errors->has('costo_uva') ? 'is-invalid' : '' }}"
												id="costo_uva" name="costo_uva" min="0" step="0.01" value="{{$barrica->costo_uva}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
											@if ($errors->has('costo_uva'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("costo_uva")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- INPUT COSTO BARRICA --}}

								<div class="col-12">
									<i class="fa fa-plus" aria-hidden="true"></i>
									<div class="form-group">
										<label for="costo_barrica" class="text-uppercase text-muted">Costo
											barrica</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number"
												class="form-control {{ $errors->has('costo_barrica') ? 'is-invalid' : '' }}"
												id="costo_barrica" name="costo_barrica" min="0" step="0.01"
												value="{{$barrica->costo_barrica}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
											@if ($errors->has('costo_barrica'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("costo_barrica")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- INPUT COSTO LEVADURA --}}

								<div class="col-12">
									<i class="fa fa-plus" aria-hidden="true"></i>
									<div class="form-group">
										<label for="costo_levadura" class="text-uppercase text-muted">Costo
											levadura</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number"
												class="form-control {{ $errors->has('costo_levadura') ? 'is-invalid' : '' }}"
												id="costo_levadura" name="costo_levadura" min="0" step="0.01"
												value="{{$barrica->costo_levadura}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
											@if ($errors->has('costo_barrica'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("costo_barrica")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- INPUT COSTO BOTELLA --}}
								<div class="col-12">
									<i class="fa fa-plus" aria-hidden="true"></i>
									<div class="form-group">
										<label for="" class="text-uppercase text-muted">COSTO BOTELLA</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number"
												class="form-control {{ $errors->has('costo_botella') ? 'is-invalid' : '' }}"
												id="costo_botella" name="costo_botella" min="0" step="0.01"
												value="{{$barrica->costo_botella}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
											@if ($errors->has('costo_botella'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("costo_botella")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- INPUT COSTO CORCHO --}}
								<div class="col-12">
									<i class="fa fa-plus" aria-hidden="true"></i>
									<div class="form-group">
										<label for="" class="text-uppercase text-muted">COSTO CORCHO</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number"
												class="form-control {{ $errors->has('costo_corcho') ? 'is-invalid' : '' }}"
												id="costo_corcho" name="costo_corcho" min="0" step="0.01" value="{{$barrica->costo_corcho}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
											@if ($errors->has('costo_corcho'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("costo_corcho")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- INPUT COSTO ETIQUETA --}}
								<div class="col-12">
									<i class="fa fa-plus" aria-hidden="true"></i>
									<div class="form-group">
										<label for="" class="text-uppercase text-muted">COSTO etiqueta</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number"
												class="form-control {{ $errors->has('costo_etiqueta') ? 'is-invalid' : '' }}"
												id="costo_etiqueta" name="costo_etiqueta" min="0" step="0.01"
												value="{{$barrica->costo_etiqueta}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
											@if ($errors->has('costo_etiqueta'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("costo_etiqueta")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>

								{{-- INPUT COSTO SERVICIOS ENOLOGICOS --}}
								<div class="col-12">
									<i class="fa fa-plus" aria-hidden="true"></i>
									<div class="form-group">
										<label for="" class="text-uppercase text-muted">SERVICIOS ENOLOGICOS</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number"
												class="form-control {{ $errors->has('costo_servicios_enologicos') ? 'is-invalid' : '' }}"
												id="costo_servicios_enologicos" name="costo_servicios_enologicos"
												min="0" step="0.01" value="{{$barrica->costo_servicios_enologicos}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
											@if ($errors->has('costo_servicios_enologicos'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("costo_servicios_enologicos")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>


								{{-- INPUT SUBTOTAL VINO --}}
								<div class="col-12">
									<hr>
									<div class="form-group">
										<label for="" class="text-uppercase text-muted">SUBTOTAL VINO</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputSubtotalVino"
												id="costo_subtotal_vino" name="costo_subtotal_vino" min="0" step="0.01"
												readonly value="39.223">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
											@if ($errors->has('costo_subtotal_vino'))
											{{-- expr --}}
											<span class="invalid-feedback">
												<strong>{{ $errors->first("costo_subtotal_vino")}}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>


							</div>
						</div>
					</div>
				</div>

				{{-- IEPS --}}

				<div class="col-12 col-md-6">
					<small class="text-uppercase text-muted">IEPS</small>
					<div class="card card-body">
						<div class="row">

							{{-- SUBTOTAL VINO --}}

							<div class="col-12">
								<div class="form-group">
									<label for="costo_uva" class="text-uppercase text-muted">SUBTOTAL VINO</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input type="number" class="form-control inputSubtotalVino" min="0" step="0.01"
											readonly>
										<div class="input-group-append">
											<span class="input-group-text"><strong>USD</strong></span>
										</div>
									</div>
								</div>
							</div>

							{{-- INPUT PORCENTAJE IEPS --}}

							<div class="col-12">
								<i class="fa fa-times" aria-hidden="true"></i>
								<div class="form-group">
									<label for="costo_uva" class="text-uppercase text-muted">PORCENTAJE IEPS</label>
									<div class="input-group">
										<input type="number" class="form-control inputPorcentajeIEPS" min="0"
											step="0.01" readonly value="24">
										<div class="input-group-append">
											<span class="input-group-text"><strong>%</strong></span>
										</div>
									</div>
								</div>
							</div>

							{{-- INPUT IEPS --}}

							<div class="col-12">
								<hr>
								<div class="form-group">
									<label for="costo_uva" class="text-uppercase text-muted">IEPS</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input type="number" class="form-control inputIEPS" min="0" step="0.01" readonly
											value="0.00">
										<div class="input-group-append">
											<span class="input-group-text"><strong>USD</strong></span>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				{{-- IVA --}}

				<div class="col-12 col-md-6">
					<small class="text-uppercase text-muted">IVA</small>
					<div class="card card-body">
						<div class="row">

							{{--  --}}

							<div class="col-12">
								<div class="form-group">
									<label for="costo_uva" class="text-uppercase text-muted">SUBTOTAL VINO</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input type="number" class="form-control inputSubtotalVino" min="0" step="0.01"
											readonly>
										<div class="input-group-append">
											<span class="input-group-text"><strong>USD</strong></span>
										</div>
									</div>
								</div>
							</div>

							{{--  --}}

							{{-- INPUT PORCENTAJE IVA --}}

							<div class="col-12">
								<i class="fa fa-times" aria-hidden="true"></i>
								<div class="form-group">
									<label for="costo_uva" class="text-uppercase text-muted">PORCENTAJE IVA</label>
									<div class="input-group">
										<input type="number" class="form-control inputPorcentajeIVA" min="0" step="0.01"
											readonly value="16">
										<div class="input-group-append">
											<span class="input-group-text"><strong>%</strong></span>
										</div>
									</div>
								</div>
							</div>

							{{-- INPUT IVA --}}

							<div class="col-12">
								<hr>
								<div class="form-group">
									<label for="costo_uva" class="text-uppercase text-muted">IVA</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input type="number" class="form-control inputIVA" min="0" step="0.01" readonly
											value="0.00">
										<div class="input-group-append">
											<span class="input-group-text"><strong>USD</strong></span>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				{{-- IMPUESTOS --}}

				<div class="col-12 col-md-6">
					<small class="text-uppercase text-muted">IMPUESTOS</small>
					<div class="card">
						<div class="card-body">


							<div class="row">

								{{-- INPUT IEPS --}}

								<div class="col-12">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">IEPS</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputIEPS" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT IVA --}}

								<div class="col-12">
									<i class="fa fa-plus" aria-hidden="true"></i>
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">IVA</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputIVA" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT IMPUESTOS --}}

								<div class="col-12">
									<hr>
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">IMPUESTOS</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputImpuestos" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				{{-- ADMINISTRACION --}}

				<div class="col-12 col-md-6">
					<small class="text-uppercase text-muted">ADMINISTRACION</small>
					<div class="card">
						<div class="card-body">
							<div class="row">

								{{-- SUBTOTAL VINO --}}

								<div class="col-6">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">SUBTOTAL VINO</label>
										<i class="fa fa-plus float-right pt-1" aria-hidden="true"></i>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputSubtotalVino" min="0"
												step="0.01" readonly>
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT IMPUESTOS --}}

								{{-- <div class="col-2 text-center">
							</div> --}}

								<div class="col-6">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">IMPUESTOS</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputImpuestos" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT PORCENTAJE ADMINISTRACION --}}

								<div class="col-12">
									<div class="text-center">
										<i class="fa fa-times text-center" aria-hidden="true"></i>
									</div>
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">PORCENTAJE
											ADMINISTRACION</label>
										<div class="input-group">
											<input type="number" name="porcentaje_administracion"
												class="form-control inputPorcentajeAdministracion" min="0" step="0.01"
												value="{{$barrica->porcentaje_administracion}}" readonly>
											<div class="input-group-append">
												<span class="input-group-text"><strong>%</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT ADMINISTRACION --}}

								<div class="col-12">
									<hr>
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">ADMINISTRACION</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputAdministracion" min="0"
												step="0.01" readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				{{-- CALCULO UTILIDAD --}}

				<div class="col-12 col-md-6">
					<small class="text-uppercase text-muted">UTILIDAD</small>
					<div class="card">
						<div class="card-body">
							<div class="row">

								{{-- SUBTOTAL VINO --}}

								<div class="col-4">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">VINO</label>
										<i class="fa fa-plus float-right pt-1" aria-hidden="true"></i>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputSubtotalVino" min="0"
												step="0.01" readonly>
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT IMPUESTOS --}}

								{{-- <div class="col-2 text-center">
							</div> --}}

								<div class="col-4">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">IMPUESTOS</label>
										<i class="fa fa-plus float-right pt-1" aria-hidden="true"></i>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputImpuestos" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT ADMINISTRACION --}}

								<div class="col-4">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">ADMIN.</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputAdministracion" min="0"
												step="0.01" readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT PORCENTAJE UTILIDAD --}}

								<div class="col-12">
									<div class="text-center">
										<i class="fa fa-times text-center" aria-hidden="true"></i>
									</div>
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">PORCENTAJE
											UTILIDAD</label>
										<div class="input-group">
											<input type="number" name="porcentaje_utilidad"
												class="form-control inputPorcentajeUtilidad" min="0" step="0.01"
												value="{{$barrica->porcentaje_utilidad}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>%</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT UTILIDAD --}}

								<div class="col-12">
									<hr>
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">UTILIDAD</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputUtilidad" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				{{-- CALCULO TRANSPORTE --}}

				<div class="col-12 col-md-6 mb-5">
					<small class="text-uppercase text-muted">TRANSPORTE</small>
					<div class="card">
						<div class="card-body">
							<div class="row">

								{{-- SUBTOTAL VINO --}}

								<div class="col-6">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">VINO</label>
										<i class="fa fa-plus float-right pt-1" aria-hidden="true"></i>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputSubtotalVino" min="0"
												step="0.01" readonly>
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT IMPUESTOS --}}

								{{-- <div class="col-2 text-center">
							</div> --}}

								<div class="col-6">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">IMPUESTOS</label>
										<i class="fa fa-plus float-right pt-1" aria-hidden="true"></i>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputImpuestos" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT ADMINISTRACION --}}

								<div class="col-6">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">ADMIN.</label>
										<i class="fa fa-plus float-right pt-1" aria-hidden="true"></i>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputAdministracion" min="0"
												step="0.01" readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT UTILIDAD --}}

								<div class="col-6">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">UTILIDAD</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputUtilidad" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT PORCENTAJE TRANSPORTE --}}

								<div class="col-12">
									<div class="text-center">
										<i class="fa fa-times text-center" aria-hidden="true"></i>
									</div>
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">PORCENTAJE
											TRANSPORTE</label>
										<div class="input-group">
											<input type="number" name="porcentaje_transporte"
												class="form-control inputPorcentajeTransporte" min="0" step="0.01"
												value="{{$barrica->porcentaje_transporte}}">
											<div class="input-group-append">
												<span class="input-group-text"><strong>%</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT TRANSPORTE --}}

								<div class="col-12">
									<hr>
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">TRANSPORTE</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputTransporte" min="0"
												step="0.01" readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				{{-- CALCULO PRECIOS VENTA --}}

				<div class="col-12 mb-5">
					<small class="text-uppercase text-muted">PRECIOS DE VENTA</small>
					<div class="card">
						<div class="card-body">
							<div class="row">

								{{-- INPUT PRECIO VENTA BARRICA --}}

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">BARRICA</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputPrecioVentaBarrica" min="0"
												step="0.01" readonly>
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT PRECIO VENTA CAJA --}}

								{{-- <div class="col-2 text-center">
							</div> --}}

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">CAJA</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputPrecioVentaCaja" min="0" step="0.01"
												readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

								{{-- INPUT PRECIO VENTA VINO --}}

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="costo_uva" class="text-uppercase text-muted">Vino</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="number" class="form-control inputPrecioVentaVino" min="0"
												step="0.01" readonly value="0.00">
											<div class="input-group-append">
												<span class="input-group-text"><strong>USD</strong></span>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<hr>

				<div class="col-12">
					<button type="submit" class="btn btn-primary">
						Registrar barrica
					</button>
				</div>

			</div>
		</div>
	</form>

</div>


	@endsection
	@section('script')
	<script type="text/javascript" src="{{ asset('js/date.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){

	    $("#producido").change(function(){
	       var value= $("#producido").val();
	       if(value == "Enólogo"){
	       	getEnologos();
	       }
	       else if(value == "Wine Maker"){
	       	getWineMaker();
	       }
	       else{

	       }
	    });
	});
	</script>

	<script>
		function getEnologos(){
		$.get('{{ url('/getEnologos') }}',function (data) {
			// body...

			$('#productor').empty();
			for (var i = 0; i < data.enologos.length; i++) {
			    $("#productor").append('<option id=' + data.enologos[i].id + ' value=' + data.enologos[i].id + '>' + data.enologos[i].nombre+' '+data.enologos[i].paterno+ '</option>');
			}

		});
	}
	function getWineMaker(){
		$.get('{{ url('/getWineMaker') }}',function (data) {
			// body...

			$('#productor').empty();
			for (var i = 0; i < data.wine_makers.length; i++) {
			    $("#productor").append('<option id=' + data.wine_makers[i].id + ' value=' + data.wine_makers[i].id + '>'+ data.wine_makers[i].nombre+' '+data.wine_makers[i].paterno+ '</option>');
			}

		});
	}
	</script>

	<script type="text/javascript">
		function getProductor() {
		// body...
		var id = document.getElementById("productor").value;
		$.get("{{ url('/prodBodega') }}/"+id,function(data){
			if (data.bodega) {
				$( "#nombre_bodega" ).empty();
				$( "#nombre_bodega" ).append( "Bodega: " + data.bodega.nombre );
				$('#bodega_id').val(data.bodega.id);
				$("#nombre_bodega").show();
				getBarricas(id);
			}
		},'json');
		$.get("{{ url('/prodVinicola') }}/"+id,function(data){
			if (data.vinicola) {
				$( "#nombre_vinicola" ).empty();
				$( "#nombre_vinicola" ).append( data.vinicola.tipo+": " + data.vinicola.nombre );
				$('#vinicola_id').val(data.vinicola.id);
				$("#nombre_vinicola").show();
				getUvas(id);
			}
		},'json');
	}
	function getBodega() {
		// body...
		var id = document.getElementById("bodega").value;
		$.get("{{ url('/bodBarricas') }}/"+id,function(data){
			if (data.barricas) {
				console.log(data.barricas);
				$('#barrica').empty();
				for (var i = 0; i < data.barricas.length; i++) {
				    $("#barrica").append('<option id=' + data.barricas[i].id + ' value=' + data.barricas[i].id + '>' +'tipo: '+data.barricas[i].tipo+' subtipo: '+ data.barricas[i].subtipo+' tostado: '+ data.barricas[i].tostado + '</option>');
				}
			}
		},'json');
		$.get("{{ url('/bodUvas') }}/"+id,function(data){
			if (data.uvas) {
				console.log(data.uvas);
				$('#uva').empty();
				for (var i = 0; i < data.uvas.length; i++) {
				    $("#uva").append('<option id=' + data.uvas[i].id + ' value=' + data.uvas[i].uva.title + '>' +'Uva: '+data.uvas[i].uva.title+ '</option>');
				}
			}
		},'json');
	}
	function getBarricas(id) {
		// body...
		$.get("{{ url('/prodBarricas') }}/"+id,function(data){
			if (data.barricas) {
				console.log(data.barricas);
				$('#barrica').empty();
				for (var i = 0; i < data.barricas.length; i++) {
				    $("#barrica").append('<option id=' + data.barricas[i].id + ' value=' + data.barricas[i].id + '>' +'tipo: '+data.barricas[i].tipo+' subtipo: '+ data.barricas[i].subtipo+' tostado: '+ data.barricas[i].tostado + '</option>');
				}
			}
		},'json');
	}

	function getUvas(id) {
		// body...
		$.get("{{ url('/prodUvas') }}/"+id,function(data){
			if (data.uvas) {
				console.log(data.uvas);
				$('#uva').empty();
				for (var i = 0; i < data.uvas.length; i++) {
				    $("#uva").append('<option id=' + data.uvas[i].id + ' value=' + data.uvas[i].uva.title + '>' +'Uva: '+data.uvas[i].uva.title+ '</option>');
				}
			}
		},'json');
	}

	$(document).ready(function(){
		$("#meses_barrica").change(function() {
			// body...
			inicio = $('#fecha_inicio').valueAsDate;
			$('#fecha_embotellado').val(inicio);
		});
	    $("#costo_prod").keyup(function(){
	        precio = $('#costo_prod').val();
	        precio_uva = $('#costo_uva').val();
	        precio_bar = $('#costo_barrica').val();
	        iva = precio*0.16;
	        ieps = precio*0.30;
	        costo_total =+precio_bar+ +precio_uva+ +precio+ +iva+ +ieps;
	        // console.log(costo_total);
	        $('#costo_total').val(costo_total.toFixed(2));
	    });

	    $('#utilidad').keyup(function(){
	    	porc_utilidad = $('#utilidad').val();
	    	costo_total = $('#costo_total').val();
	    	utilidad = costo_total*(porc_utilidad/100);
	    	final = +costo_total+ +utilidad;
	    	// console.log(final);
	    	$('#precio_final').val(final.toFixed(2));
	    });

	    $('#meses_barrica').keyup(function() {
	    	// body...
	    	fecha = new Date($('#fecha_inicio').val());
	    	m_barrica = $('#meses_barrica').val();
	    	fecha_emb = new Date(fecha).add(parseInt(m_barrica)).month();
	    	// console.log(fecha_emb.toString('yyyy/MM/dd'));

	    	$('#fecha_embotellado').val(fecha_emb.toString('yyyy-MM-dd'));
	    });

	    $('#meses_estabilizacion').keyup(function() {
	    	// body...
	    	fecha = new Date($('#fecha_embotellado').val());
	    	m_estabil = $('#meses_estabilizacion').val();
	    	fecha_emb = new Date(fecha).add(parseInt(m_estabil)).month();
	    	// console.log(fecha_emb.toString('yyyy/MM/dd'));

	    	$('#fecha_envio').val(fecha_emb.toString('yyyy-MM-dd'));
	    })

	});


	// ==========================
	// 
	// ==========================

	function calcularSubtotalVino(){
		const costo_uva = parseFloat( $('#costo_uva').val() )
		const costo_barrica = parseFloat( $('#costo_barrica').val() )
		const costo_levadura = parseFloat( $('#costo_levadura').val() )
		const costo_botella = parseFloat( $('#costo_botella').val() )
		const costo_corcho = parseFloat( $('#costo_corcho').val() )
		const costo_etiqueta = parseFloat( $('#costo_etiqueta').val() )
		const costo_servicios_enologicos = parseFloat( $('#costo_servicios_enologicos').val() )

		const total = 
			costo_uva + 
			costo_barrica + 
			costo_levadura + 
			costo_botella + 
			costo_corcho + 
			costo_etiqueta + 
			costo_servicios_enologicos;

		$('.inputSubtotalVino').each( function(){
			$(this).val( parseFloat( total ).toFixed(2) )
		} );

	}

	function calcularIEPS(){
		const subtotalVino = parseFloat( $('.inputSubtotalVino').first().val() )
		const porcentajeIEPS = parseFloat( $('.inputPorcentajeIEPS').first().val() )

		const totalIEPS = (subtotalVino * porcentajeIEPS / 100).toFixed(2)

		console.log({
			subtotalVino,
			porcentajeIEPS,
			totalIEPS
		})

		$('.inputIEPS').each( function(){
			$(this).val( totalIEPS )
		} )
	}

	function calcularIVA(){
		const subtotalVino = parseFloat( $('.inputSubtotalVino').first().val() )
		const porcentajeIVA = parseFloat( $('.inputPorcentajeIVA').first().val() )

		const totalIVA = (subtotalVino * porcentajeIVA / 100).toFixed(2)

		$('.inputIVA').each( function(){
			$(this).val( totalIVA )
		} )

	}

	function calcularImpuestos(){
		const iva = parseFloat( $('.inputIVA').first().val() )
		const ieps = parseFloat( $('.inputIEPS').first().val() )

		const totalImpuestos = iva + ieps

		$('.inputImpuestos').each( function(){
			$(this).val( (totalImpuestos).toFixed(2) )
		} )
	}

	function calcularAdministracion(){
		const subtotalVino = parseFloat( $('.inputSubtotalVino').first().val() )
		const impuestos = parseFloat( $('.inputImpuestos').first().val() )
		const porcentajeAdministracion = parseFloat( $('.inputPorcentajeAdministracion').first().val() )

		const totalAdministracion = (subtotalVino + impuestos) * porcentajeAdministracion / 100

		$('.inputAdministracion').each( function(){
			$(this).val( (totalAdministracion).toFixed(2) )
		} )
	}

	function calcularUtilidad(){
		const subtotalVino = parseFloat( $('.inputSubtotalVino').first().val() )
		const impuestos = parseFloat( $('.inputImpuestos').first().val() )
		const administracion = parseFloat( $('.inputAdministracion').first().val() )
		const porcentajeUtilidad = parseFloat( $('.inputPorcentajeUtilidad').first().val() )

		const totalUtilidad = (subtotalVino + impuestos + administracion) * porcentajeUtilidad / 100

		// console.log({

		// })

		$('.inputUtilidad').each( function(){
			$(this).val( (totalUtilidad).toFixed(2) )
		} )
	}

	function calcularTransporte(){
		const subtotalVino = parseFloat( $('.inputSubtotalVino').first().val() )
		const impuestos = parseFloat( $('.inputImpuestos').first().val() )
		const administracion = parseFloat( $('.inputAdministracion').first().val() )
		const utilidad = parseFloat( $('.inputUtilidad').first().val() )
		const porcentajeTransporte = parseFloat( $('.inputPorcentajeTransporte').first().val() )

		const totalUtilidad = (subtotalVino + impuestos + administracion + utilidad) * porcentajeTransporte / 100

		// console.log({

		// })

		$('.inputTransporte').each( function(){
			$(this).val( (totalUtilidad).toFixed(2) )
		} )
	}

	function calcularPrecioVentaBarrica(){
		const subtotalVino = parseFloat( $('.inputSubtotalVino').first().val() )
		const impuestos = parseFloat( $('.inputImpuestos').first().val() )
		const administracion = parseFloat( $('.inputAdministracion').first().val() )
		const utilidad = parseFloat( $('.inputUtilidad').first().val() )
		const transporte = parseFloat( $('.inputTransporte').first().val() )

		const totalPrecioVentaBarrica = (subtotalVino + impuestos + administracion + utilidad + transporte)

		$('.inputPrecioVentaBarrica').each( function(){
			$(this).val( (totalPrecioVentaBarrica).toFixed(2) )
		} )
	}

	function calcularPrecioVentaVino(){
		const precioVentaBarrcia = parseFloat( $('.inputPrecioVentaBarrica').first().val() )

		const totalPrecioVentaBarrica = precioVentaBarrcia / 260

		$('.inputPrecioVentaVino').each( function(){
			$(this).val( (totalPrecioVentaBarrica).toFixed(2) )
		} )
	}
	
	function calcularPrecioVentaCaja(){
		const precioVentaVino = parseFloat( $('.inputPrecioVentaVino').first().val() )

		const totalPrecioVentaCaja = precioVentaVino * 12

		$('.inputPrecioVentaCaja').each( function(){
			$(this).val( (totalPrecioVentaCaja).toFixed(2) )
		} )
	}

	function calcularTodo(){
		calcularSubtotalVino()
		calcularIEPS()
		calcularIVA()
		calcularImpuestos()
		calcularAdministracion()
		calcularUtilidad()
		calcularTransporte()
		calcularPrecioVentaBarrica()
		calcularPrecioVentaVino()
		calcularPrecioVentaCaja()
	}

	$(document).on('change', '#costo_uva, #costo_barrica, #costo_levadura, #costo_botella, #costo_corcho, #costo_etiqueta, #costo_servicios_enologicos, .inputPorcentajeUtilidad, .inputPorcentajeTransporte', function(){
		calcularTodo()
	})


	$(document).ready( function(){
		calcularTodo()
	} );



	</script>
	@endsection