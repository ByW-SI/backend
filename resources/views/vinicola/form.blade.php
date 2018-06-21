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
							<a class="nav-link {{$edit ? '' : 'disabled'}}" @if ($edit == true)
								{{-- true expr --}}
								href="{{ route('vinicolas.marcas.index',['vinicola'=>$vinicola]) }}" 
							@else
								{{-- false expr --}}
								href="#" 
								onclick="disabled('marcas')"
							@endif>Marcas de la bodega</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{$edit ? '' : 'disabled'}}" @if ($edit == true)
								{{-- true expr --}}
								href="{{ route('vinicolas.uvas.index',['vinicola'=>$vinicola]) }}" 
							@else
								{{-- false expr --}}
								href="#" 
								onclick="disabled('uvas')"
							@endif>Tipo de uvas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{$edit ? '' : 'disabled'}}" @if ($edit == true)
								{{-- true expr --}}
								href="{{ route('vinicolas.barricas.index',['vinicola'=>$vinicola]) }}" 
							@else
								{{-- false expr --}}
								href="#" 
								onclick="disabled('barricas')"
							@endif>Barricas</a>
						</li>
					</ul>
					<div class="card-body">
						<form method="POST" action="{{ $edit == false ? route('vinicolas.store') : route('vinicolas.update',$vinicola) }}">
							@csrf

							@if ($edit == true)
								{{-- expr --}}
								<input type="hidden" name="_method" value="PUT">
							@endif

							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre de la bodega:</label>
								<div class="col-md-6">
									<input id="nombre" type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : ''  }}" name="nombre" value="{{ $edit ? $vinicola->nombre : old('nombre') }}" required autofocus="">
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
									<textarea id="distinciones" type="text" class="form-control {{ $errors->has('distinciones') ? ' is-invalid' : ''  }}" name="distinciones" value="{{ $edit ? $vinicola->distinciones : old('distinciones') }}" >{{ $edit ? $vinicola->distinciones : old('distinciones') }}</textarea>
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
									<input id="inicio" type="number" min="1500" max="{{date("Y")}}" class="form-control {{ $errors->has('inicio') ? ' is-invalid' : ''  }}" name="inicio" value="{{ $edit ? $vinicola->inicio : old('inicio') }}" required>
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
									<textarea id="filosofia" type="text" class="form-control {{ $errors->has('filosofia') ? ' is-invalid' : ''  }}" name="filosofia" value="{{ old('filosofia') }}" required>{{ $edit ? $vinicola->filosofia : old('filosofia') }}</textarea>
									@if ($errors->has('filosofia'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("filosofia")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="locacion" class="col-md-4 col-form-label text-md-right">Locación del bodega:</label>
								<div class="col-md-6">
									<input id="locacion" type="text" class="form-control {{ $errors->has('locacion') ? ' is-invalid' : ''  }}" name="locacion" value="{{ $edit ? $vinicola->locacion : old('locacion') }}" required>
									<input type="hidden" name="lat" id="latitud" value="">
									<input type="hidden" name="long" id="longitud" value="">
									@if ($errors->has('locacion'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("locacion")}}</strong>
										</span>
									@endif
								</div>
								<input name="mapinput" id="pac-input" class="form-control" type="text" style="width: 85%;">
								<div id="map" style="height: 400px;width: 90%;margin-left: 30px;"></div>
							</div>
							<div class="form-group row">
								<label for="enologo" class="col-md-4 col-form-label text-md-right">Enologo:</label>
								<div class="col-md-6">
									<input id="enologo" type="text" class="form-control {{ $errors->has('enologo') ? ' is-invalid' : ''  }}" name="enologo" value="{{ $edit ? $vinicola->enologo : old('enologo') }}" required>
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
									<input id="wine_maker" type="text" class="form-control {{ $errors->has('wine_maker') ? ' is-invalid' : ''  }}" name="wine_maker" value="{{ $edit ? $vinicola->wine_maker : old('wine_maker') }}">
									@if ($errors->has('wine_maker'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("wine_maker")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="contacto" class="col-md-4 col-form-label text-md-right">Nombre completo del contacto:</label>
								<div class="col-md-6">
									<input id="contacto" type="text" class="form-control {{ $errors->has('contacto') ? ' is-invalid' : ''  }}" name="contacto" value="{{ $edit ? $vinicola->contacto : old('contacto') }}">
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
									<input id="puesto" type="text" class="form-control {{ $errors->has('puesto') ? ' is-invalid' : ''  }}" name="puesto" value="{{ $edit ? $vinicola->puesto : old('puesto') }}">
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
									<input id="correo" type="text" class="form-control {{ $errors->has('correo') ? ' is-invalid' : ''  }}" name="correo" value="{{ $edit ? $vinicola->correo : old('correo') }}">
									@if ($errors->has('correo'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("correo")}}</strong>
										</span>
									@endif
								</div>
								<label for="celular" class="col-md-4 col-form-label text-md-right">Telefono celular del contacto:</label>
								<div class="col-md-6">
									<input id="celular" type="text" class="form-control {{ $errors->has('celular') ? ' is-invalid' : ''  }}" name="celular" value="{{ $edit ? $vinicola->celular : old('celular') }}">
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
									<input id="telefono" type="text" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : ''  }}" name="telefono" value="{{ $edit ? $vinicola->telefono : old('telefono') }}">
									@if ($errors->has('telefono'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("telefono")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="observacion" class="col-md-4 col-form-label text-md-right">Observación de la bodega:</label>
								<div class="col-md-6">
									<input type="date" class="form-control {{$errors->has('fecha_observacion') ? ' is-invalid' : ''  }}" name="fecha_observacion" value="{{$edit ? $vinicola->fecha_observacion : old('fecha_observacion')}}" style="margin-bottom: 3px;">
									@if ($errors->has('observacion'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("observacion")}}</strong>
										</span>
									@endif
									<textarea id="observaciones" class="form-control {{$errors->has('observaciones') ? ' is-invalid' : ''  }}" name="observaciones" value="{{ old('observaciones') }}">{{ $edit ? $vinicola->observaciones : old('observaciones') }}</textarea>
									@if ($errors->has('observaciones'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("observaciones")}}</strong>
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
    {{-- <script> --}}
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