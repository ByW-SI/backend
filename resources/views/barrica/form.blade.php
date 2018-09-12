@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">
						Barrica
					</div>						
					<div class="card-body">
						<form method="POST" action="{{ $edit == false ? route('barricas.store') : route('barricas.update',['barrica'=>$barrica]) }}">
							@csrf

							@if ($edit == true)
								{{-- expr --}}
								<input type="hidden" name="_method" value="PUT">
							@endif
@if ($edit == false)
	{{-- true expr --}}

	{{-- producido --}}
							<div class="form-group row">
								<label for="producido" class="col-md-4 col-form-label text-md-right">Tipo de productor:</label>
								<div class="col-md-6">
									<select id="producido" class="form-control {{ $errors->has('producido') ? ' is-invalid' : ''  }}" name="producido">
										<option value="">Seleccione una opción</option>
										<option value="Wine Maker">Wine Maker</option>
										<option value="Enólogo">Enólogo</option>
									</select>
									@if ($errors->has('producido'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("producido")}}</strong>
										</span>
									@endif
								</div>
							</div>
{{-- enologo_id --}}
							<div class="form-group row">
								<label for="productor" class="col-md-4 col-form-label text-md-right">Productor:</label>
								<div class="col-md-6">
									<select id="productor" class="form-control {{ $errors->has('productor') ? ' is-invalid' : ''  }}" name="productor">
										<option value="">Seleccione una opción</option>
										
									</select>
									@if ($errors->has('productor'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("productor")}}</strong>
										</span>
									@endif
								</div>
							</div>

{{-- tipo_bar --}}
							<div class="form-group row">
								<label for="tipo_bar" class="col-md-4 col-form-label text-md-right">Tipo de barrica:</label>
								<div class="col-md-6">
									<select id="tipo_bar" class="form-control {{ $errors->has('tipo_bar') ? ' is-invalid' : ''  }}" name="tipo_bar" required >
										<option value="">Seleccione su barrica</option>
										<option value="Europeo">Europeo</option>
										<option value="Americana">Americana</option>
										<option value="Bosques de europa central">Bosques de europa central</option>
									</select>
									@if ($errors->has('tipo_bar'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("tipo_bar")}}</strong>
										</span>
									@endif
								</div>
							</div>
{{-- tostado --}}
							<div class="form-group row">
								<label for="tostado" class="col-md-4 col-form-label text-md-right">Tostado de barrica:</label>
								<div class="col-md-6">
									<select id="tostado" class="form-control {{ $errors->has('tostado') ? ' is-invalid' : ''  }}" name="tostado" required >
										<option value="">Seleccione su tostado</option>
										<option value="Ligero">Ligero</option>
										<option value="Medio">Medio</option>
										<option value="Alto">Alto</option>
									</select>
									@if ($errors->has('tostado'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("tostado")}}</strong>
										</span>
									@endif
								</div>
							</div>

{{-- bodega_id --}}
							<div class="form-group row">
								<label for="bodega_id" class="col-md-4 col-form-label text-md-right">Bodega:</label>
								<div class="col-md-6">
									<select id="bodega_id" class="form-control {{ $errors->has('bodega_id') ? ' is-invalid' : ''  }}" name="bodega_id" required >
										<option value="">Seleccione su bodega</option>
										@foreach ($bodegas as $bodega)
											{{-- expr --}}
											<option value="{{$bodega->id}}">{{$bodega->nombre}}</option>
										@endforeach
									</select>
									@if ($errors->has('bodega_id'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("bodega_id")}}</strong>
										</span>
									@endif
								</div>
							</div>
{{-- uva --}}
							<div class="form-group row">
								<label for="uva" class="col-md-4 col-form-label text-md-right">Uva:</label>
								<div class="col-md-6">
									<select id="uva" class="form-control {{ $errors->has('uva') ? ' is-invalid' : ''  }}" name="uva" required >
										<option value="">Seleccione su uva</option>
										@foreach ($uvas as $uva)
											{{-- expr --}}
											<option value="{{$uva->title}}">{{$uva->title}}</option>
										@endforeach
									</select>
									@if ($errors->has('uva'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("uva")}}</strong>
										</span>
									@endif
								</div>
							</div>
{{-- vinicola_id --}}
							<div class="form-group row">
								<label for="vinicola_id" class="col-md-4 col-form-label text-md-right">Vinicola o rancho:</label>
								<div class="col-md-6">
									<select id="vinicola_id" class="form-control {{ $errors->has('vinicola_id') ? ' is-invalid' : ''  }}" name="vinicola_id" required >
										<option value="">Seleccione su vinicola</option>
										@foreach ($vinicolas as $vinicola)
											{{-- expr --}}
											<option value="{{$vinicola->id}}">{{$vinicola->tipo}} {{$vinicola->nombre}}</option>
										@endforeach
									</select>
									@if ($errors->has('uva'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("uva")}}</strong>
										</span>
									@endif
								</div>
							</div>

@else
	{{-- false expr --}}
							<div class="form-group row">
								<label for="producido" class="col-md-4 col-form-label text-md-right">Productor</label>
								<div class="col-md-6">
									<p> {{$barrica->enologo->tipo}} {{$barrica->enologo->nombre}} {{$barrica->enologo->paterno}} {{$barrica->enologo->materno}}</p>
								</div>
							</div>

							<div class="form-group row">
								<label for="tipo_barrica" class="col-md-4 col-form-label text-md-right">Tipo de barrica:</label>
								<div class="col-md-6">
									<p> {{$barrica->tipo_bar}}</p>
								</div>
							</div>

							<div class="form-group row">
								<label for="subtipo_barrica" class="col-md-4 col-form-label text-md-right">Tostado de barrica:</label>
								<div class="col-md-6">
									<p> {{$barrica->tostado}}</p>
								</div>
							</div>
							@if ($barrica->bodega)
								{{-- true expr --}}
							<div class="form-group row">
								<label for="tostado_barrica" class="col-md-4 col-form-label text-md-right">Bodega:</label>
								<div class="col-md-6">
									<p> {{$barrica->bodega->nombre}}</p>
								</div>
							</div>
							
							@endif

							@if ($barrica->vinicola)
								{{-- true expr --}}
							<div class="form-group row">
								<label for="tostado_barrica" class="col-md-4 col-form-label text-md-right">Vinicola:</label>
								<div class="col-md-6">
									<p>{{$barrica->vinicola->tipo}} {{$barrica->vinicola->nombre}}</p>
								</div>
							</div>
							
							@endif
							

							<div class="form-group row">
								<label for="tipo_barrica" class="col-md-4 col-form-label text-md-right">Uva:</label>
								<div class="col-md-6">
									<p> {{$barrica->uva}}</p>
								</div>
							</div>


@endif




{{-- costo uva --}}
							<div class="form-group row">
								<label for="costo_uva" class="col-md-4 col-form-label text-md-right">Costo de la uva:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
								  	</div>
									<input type="number" class="form-control {{ $errors->has('costo_uva') ? 'is-invalid' : '' }}" id="costo_uva" name="costo_uva" min="0" step="0.01" value="{{$edit ? $barrica->costo_uva : old('costo_uva')}}">
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
{{-- costo barrica --}}
							<div class="form-group row">
								<label for="costo_barrica" class="col-md-4 col-form-label text-md-right">Costo de la barrica:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
								  	</div>
									<input type="number" class="form-control {{ $errors->has('costo_barrica') ? 'is-invalid' : '' }}" id="costo_barrica" name="costo_barrica" min="0" step="0.01" value="{{$edit ? $barrica->costo_barrica : old('costo_barrica')}}">
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
{{-- costo produccion --}}
							<div class="form-group row">
								<label for="costo_prod" class="col-md-4 col-form-label text-md-right">Costo de producción:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
								  	</div>
									<input type="number" class="form-control {{ $errors->has('costo_prod') ? 'is-invalid' : '' }}" id="costo_prod" name="costo_prod" min="0" step="0.01" value="{{$edit ? $barrica->costo_prod : old('costo_prod')}}">
									<div class="input-group-append">
    									<span class="input-group-text"><strong>USD</strong></span>
									</div>
									@if ($errors->has('costo_prod'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("costo_prod")}}</strong>
										</span>
									@endif
								</div>
							</div>

{{-- añada --}}
							<div class="form-group row">
								<label for="anada" class="col-md-4 col-form-label text-md-right">Añada:</label>
								<div class="input-group col-md-6">
									<input type="number" class="form-control {{ $errors->has('anada') ? 'is-invalid' : '' }}" name="anada" min="{{date('Y')}}" step="1" value="{{$edit ? $barrica->anada : old('anada')}}">
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

{{-- fecha inicio --}}
							<div class="form-group row">
								<label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">Fecha de inicio:</label>
								<div class="col-md-6">
									<input type="date" id="fecha_inicio" min="{{date('Y-m-d')}}" class="form-control {{ $errors->has('fecha_inicio') ? ' is-invalid' : ''  }}" name="fecha_inicio" value="{{$edit ? $barrica->fecha_inicio : date('Y-m-d')}}">
									@if ($errors->has('fecha_inicio'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("fecha_inicio")}}</strong>
										</span>
									@endif
								</div>
							</div>

{{-- meses barricas --}}
							<div class="form-group row">
								<label for="meses_barrica" class="col-md-4 col-form-label text-md-right">Meses tentativos en barrica:</label>
								<div class="input-group col-md-6">
									<input type="number" id="meses_barrica" class="form-control {{ $errors->has('meses_barrica') ? 'is-invalid' : '' }}" name="meses_barrica" min="0" step="6" value="{{$edit ? $barrica->meses_barrica : old('meses_barrica')}}">
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
{{-- fecha embotellado --}}
							<div class="form-group row">
								<label for="fecha_embotellado" class="col-md-4 col-form-label text-md-right">Fecha tentativa de embotellado:</label>
								<div class="col-md-6">
									<input type="date" id="fecha_embotellado" min="{{date('Y-m-d')}}" class="form-control {{ $errors->has('fecha_embotellado') ? ' is-invalid' : ''  }}" name="fecha_embotellado" value="{{$edit ? $barrica->fecha_embotellado : old('fecha_embotellado')}}">
									@if ($errors->has('fecha_embotellado'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("fecha_embotellado")}}</strong>
										</span>
									@endif
								</div>
							</div>

{{-- meses estabilizacion --}}
							<div class="form-group row">
								<label for="meses_estabilizacion" class="col-md-4 col-form-label text-md-right">Meses tentativos en estabilización:</label>
								<div class="input-group col-md-6">
									<input type="number" class="form-control {{ $errors->has('meses_estabilizacion') ? 'is-invalid' : '' }}" id="meses_estabilizacion" name="meses_estabilizacion" min="0" step="1" value="{{$edit ? $barrica->meses_estabilizacion : old('meses_estabilizacion')}}">
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

{{-- fecha envios --}}
							<div class="form-group row">
								<label for="fecha_envio" class="col-md-4 col-form-label text-md-right">Fecha tentativa de envio:</label>
								<div class="col-md-6">
									<input type="date" id="fecha_envio" min="{{date('Y-m-d')}}" class="form-control {{ $errors->has('fecha_envio') ? ' is-invalid' : ''  }}" name="fecha_envio" value="{{$edit ? $barrica->fecha_envio : old('fecha_envio')}}">
									@if ($errors->has('fecha_envio'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("fecha_envio")}}</strong>
										</span>
									@endif
								</div>
							</div>

{{-- precio venta --}}


							<div class="form-group row">
								<label for="precio_venta" class="col-md-4 col-form-label text-md-right">Precio de venta:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
								  	</div>
									<input type="number" class="form-control {{ $errors->has('precio_venta') ? 'is-invalid' : '' }}" id="precio_venta" name="precio_venta" min="0" step="0.01" value="{{$edit ? $barrica->precio_venta : old('precio_venta')}}">
									<div class="input-group-append">
    									<span class="input-group-text"><strong>USD</strong></span>
									</div>
									@if ($errors->has('precio_venta'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("precio_venta")}}</strong>
										</span>
									@endif
								</div>
							</div>

{{-- utilidad --}}
							<div class="form-group row">
								<label for="utilidad" class="col-md-4 col-form-label text-md-right">Utilidad:</label>
								<div class="input-group col-md-6">
									<input type="number" id="utilidad" class="form-control {{ $errors->has('utilidad') ? 'is-invalid' : '' }}" name="utilidad" min="0" step="5" value="{{$edit ? $barrica->utilidad : old('utilidad')}}">
									<div class="input-group-append">
    									<span class="input-group-text"><strong>%</strong></span>
									</div>
									@if ($errors->has('utilidad'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("utilidad")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="precio_final" class="col-md-4 col-form-label text-md-right">Precio de venta:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
								  	</div>
									<span id="precio_final" class="form-control"></span>
									<div class="input-group-append">
    									<span class="input-group-text"><strong>USD</strong></span>
									</div>
								</div>
							</div>
							<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar barrica
                                </button>
                            </div>
                        </div>
						</form>
				</div>
			</div>
		</div>
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
	        precio_venta =+precio_bar+ +precio_uva+ +precio+ +iva+ +ieps;
	        // console.log(precio_venta);
	        $('#precio_venta').val(precio_venta.toFixed(2));
	    });

	    $('#utilidad').keyup(function(){
	    	porc_utilidad = $('#utilidad').val();
	    	precio_venta = $('#precio_venta').val();
	    	utilidad = precio_venta*(porc_utilidad/100);
	    	final = +precio_venta+ +utilidad;
	    	// console.log(final);
	    	$('#precio_final').text(final.toFixed(2));
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
</script>
@endsection