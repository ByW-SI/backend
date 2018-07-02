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
										<option value="productor">Productor</option>
										<option value="bodega">Bodega</option>
									</select>
									@if ($errors->has('productor'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("productor")}}</strong>
										</span>
									@endif
								</div>
							</div>

							{{-- if productor --}}

							<div class="form-group row productor" @if ($edit == false)
								style="display: none;" 
							@endif>
								<label for="productor" class="col-md-4 col-form-label text-md-right">Productor:</label>
								<div class="col-md-6">
									<select id="productor" class="form-control {{ $errors->has('productor') ? ' is-invalid' : ''  }}" name="productor"   onchange="getProductor()">
										<option value="">Seleccione su productor</option>
										@foreach ($productoras as $productor)
											{{-- expr --}}
											<option value="{{$productor->id}}">{{$productor->nombre}}</option>
										@endforeach
									</select>
									<label for="nombre_bodega" class="col-form-label text-md-right" id="nombre_bodega"  @if ($edit == false)
									style="display: none;" 
									@endif></label>
									<input type="hidden" id="bodega_id" name="bodega_id" value="">
									<label for="nombre_vinicola" class="col-form-label text-md-right" id="nombre_vinicola"  @if ($edit == false)
										style="display: none;" 
									@endif></label>
									<input type="hidden" id="vinicola_id" name="vinicola_id" value="">
									@if ($errors->has('productor'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("productor")}}</strong>
										</span>
									@endif
								</div>
							</div>
{{-- if bodega --}}

							<div class="form-group row bodega" @if ($edit == false)
								style="display: none;" 
							@endif>
								<label for="bodega" class="col-md-4 col-form-label text-md-right">Bodega:</label>
								<div class="col-md-6">
									<select id="bodega" class="form-control {{ $errors->has('bodega') ? ' is-invalid' : ''  }}" name="bodega" onchange="getBodega()">
										<option value="">Seleccione su bodega</option>
									@foreach ($bodegas as $bodega)
										{{-- expr --}}
										<option value="{{$bodega->id}}">{{$bodega->nombre}}</option>
									@endforeach
									</select>
								</div>
							</div>

{{-- endif --}}
							<div class="form-group row">
								<label for="barrica" class="col-md-4 col-form-label text-md-right">Barrica:</label>
								<div class="col-md-6">
									<select id="barrica" class="form-control {{ $errors->has('barrica') ? ' is-invalid' : ''  }}" name="barrica" required >
										<option value="">Seleccione su barrica</option>
									</select>
									@if ($errors->has('productor'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("barrica")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="uva" class="col-md-4 col-form-label text-md-right">Uva:</label>
								<div class="col-md-6">
									<select id="uva" class="form-control {{ $errors->has('uva') ? ' is-invalid' : ''  }}" name="uva" required >
										<option value="">Seleccione su uva</option>
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
								<label for="producido" class="col-md-4 col-form-label text-md-right">{{$barrica->producido_type == 'App\Productor' ? 'Productor: ' : 'Bodega: ' }}</label>
								<div class="col-md-6">
									<p> {{$barrica->producido->nombre}}</p>
								</div>
							</div>

							<div class="form-group row">
								<label for="tipo_barrica" class="col-md-4 col-form-label text-md-right">Tipo de barrica:</label>
								<div class="col-md-6">
									<p> {{$barrica->barrica_bodega->tipo}}</p>
								</div>
							</div>

							<div class="form-group row">
								<label for="subtipo_barrica" class="col-md-4 col-form-label text-md-right">Subtipo de barrica:</label>
								<div class="col-md-6">
									<p> {{$barrica->barrica_bodega->subtipo}}</p>
								</div>
							</div>

							<div class="form-group row">
								<label for="tostado_barrica" class="col-md-4 col-form-label text-md-right">Tostado de barrica:</label>
								<div class="col-md-6">
									<p> {{$barrica->barrica_bodega->tostado}}</p>
								</div>
							</div>

							<div class="form-group row">
								<label for="tipo_barrica" class="col-md-4 col-form-label text-md-right">Uva:</label>
								<div class="col-md-6">
									<p> {{$barrica->uva}}</p>
								</div>
							</div>


@endif



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


							<div class="form-group row">
								<label for="precio_uva" class="col-md-4 col-form-label text-md-right">Precio de la uva:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
								  	</div>
									<input type="number" class="form-control {{ $errors->has('precio_uva') ? 'is-invalid' : '' }}" name="precio_uva" min="0" step="0.01" value="{{$edit ? $barrica->precio_uva : old('precio_uva')}}">
									<div class="input-group-append">
    									<span class="input-group-text"><strong>USD</strong></span>
									</div>
									@if ($errors->has('precio_uva'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("precio_uva")}}</strong>
										</span>
									@endif
								</div>
							</div>

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

							<div class="form-group row">
								<label for="meses_barrica" class="col-md-4 col-form-label text-md-right">Meses tentativos en barrica:</label>
								<div class="input-group col-md-6">
									<input type="number" class="form-control {{ $errors->has('meses_barrica') ? 'is-invalid' : '' }}" name="meses_barrica" min="0" step="6" value="{{$edit ? $barrica->meses_barrica : old('meses_barrica')}}">
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

							<div class="form-group row">
								<label for="meses_estabilizacion" class="col-md-4 col-form-label text-md-right">Meses tentativos en estabilización:</label>
								<div class="input-group col-md-6">
									<input type="number" class="form-control {{ $errors->has('meses_estabilizacion') ? 'is-invalid' : '' }}" name="meses_estabilizacion" min="0" step="6" value="{{$edit ? $barrica->meses_estabilizacion : old('meses_estabilizacion')}}">
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

							<div class="form-group row">
								<label for="precio_prod" class="col-md-4 col-form-label text-md-right">Precio de producción:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
								  	</div>
									<input type="number" class="form-control {{ $errors->has('precio_prod') ? 'is-invalid' : '' }}" name="precio_prod" min="0" step="0.01" value="{{$edit ? $barrica->precio_prod : old('precio_prod')}}">
									<div class="input-group-append">
    									<span class="input-group-text"><strong>USD</strong></span>
									</div>
									@if ($errors->has('precio_prod'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("precio_prod")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="precio_venta" class="col-md-4 col-form-label text-md-right">Precio de venta:</label>
								<div class="input-group col-md-6">
									<div class="input-group-prepend">
    									<span class="input-group-text">$</span>
								  	</div>
									<input type="number" class="form-control {{ $errors->has('precio_venta') ? 'is-invalid' : '' }}" name="precio_venta" min="0" step="0.01" value="{{$edit ? $barrica->precio_venta : old('precio_venta')}}">
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
<script type="text/javascript">
	$(document).ready(function(){

	    $("#producido").change(function(){
	       var value= $("#producido").val();
	       if(value == "productor"){
	       	$('.productor').show();
	       	$('.bodega').hide();
	       }
	       else if(value == "bodega"){
	       	$('.productor').hide();
	       	$('.bodega').show()
	       }
	       else{

	       }
	    });
	});
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
</script>
@endsection