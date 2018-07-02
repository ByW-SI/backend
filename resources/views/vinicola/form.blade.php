@extends('layouts.app2')
@section('content')
	{{-- expr --}}
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">
						Vinicola/Rancho
					</div>						
					<div class="card-body">
						<form method="POST" action="{{ $edit == false ? route('vinicolas.store') : route('vinicolas.update',['vinicola'=>$vinicola]) }}">
							@csrf

							@if ($edit == true)
								{{-- expr --}}
								<input type="hidden" name="_method" value="PUT">
							@endif

							<div class="form-group row">
								<label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre de la vinicola/rancho:</label>
								<div class="col-md-6">
									<input id="nombre" type="text" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : ''  }}" name="nombre" value="{{ $edit ? $vinicola->nombre : old('nombre') }}" {{ $edit ? 'disabled' : "" }} required autofocus="">
									@if ($errors->has('nombre'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("nombre")}}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo:</label>
								<div class="col-md-6">
									<select id="tipo" class="form-control {{ $errors->has('tipo') ? ' is-invalid' : ''  }}" name="tipo" required autofocus="">
										<option value="">Seleccione el tipo</option>
										<option value="Vinicola" @if ($edit && $vinicola->tipo == "Vinicola")
											{{-- expr --}}
											selected 
										@endif>Vinicola</option>
										<option value="Rancho" @if ($edit && $vinicola->tipo == "Rancho")
											{{-- expr --}}
											selected 
										@endif>Rancho</option>
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
									<input type="hidden" name="lat" id="latitud" value="{{$edit ? $vinicola->lat : ''}}">
									<input type="hidden" name="long" id="longitud" value="{{$edit ? $vinicola->long : ''}}">
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
									<input id="correo" type="email" class="form-control {{ $errors->has('correo') ? ' is-invalid' : ''  }}" name="correo" value="{{ $edit ? $vinicola->correo : old('correo') }}">
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
								<label for="comentarios" class="col-md-4 col-form-label text-md-right">Comentarios de la bodega:</label>
								<div class="col-md-6">
									<textarea id="comentarios" class="form-control {{$errors->has('comentarios') ? ' is-invalid' : ''  }}" name="comentarios" value="{{ old('comentarios') }}">{{ $edit ? $vinicola->comentarios : old('comentarios') }}</textarea>
									@if ($errors->has('comentarios'))
										{{-- expr --}}
										<span class="invalid-feedback">
											<strong>{{ $errors->first("comentarios")}}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">		
								<label for="hectareas" class="col-md-4 col-form-label text-md-right">Hectareas totales:</label>
								<div class="input-group col-md-6">
									<input type="number" class="form-control {{ $errors->has('hectareas') ? 'is-invalid' : '' }}" name="hectareas" min="0" step="0.001" max="999.999" value="{{$edit ? $vinicola->hectareas : old('hectareas')}}">
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

							<div class="form-group row field_wrapper">
								<label for='uva' class="col-md-4 col-form-label text-md-right">Uva:</label>
								<div class="input-group col-md-6">
							        <select id="uva" class="form-control" name="uva[]">
							        	<option value="">Seleccione su uva</option>
							        	@forelse ($uvas as $uva)
							        		{{-- expr --}}
							        		<option value="{{$uva->id}}">{{$uva->title}}</option>
							        	@empty
							        		{{-- empty expr --}}
							        	@endforelse
							        </select>
							        <input type="text" placeholder="Hectareas" class="form-control" name="hectarea[]" value=""/>
							        <div class="input-group-append">
    									<span class="input-group-text"><strong>ha</strong></span>
									</div>
							        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus"></i></a>
							    </div>
							</div>
							

						<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar vinicola/rancho
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

	<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="input-group offset-md-4 col-md-6"> <select id="uva" class="form-control" name="uva[]"><option value="">Seleccione su uva</option>@foreach ($uvas as $uva)<option value="{{$uva->id}}">{{$uva->title}}</option>@endforeach</select><input type="text" placeholder="Hectareas" class="form-control" name="hectarea[]" value=""/><div class="input-group-append"><span class="input-group-text"><strong>ha</strong></span></div><a href="javascript:void(0);" class="remove_button" title="Add field"><i class="fas fa-minus-circle"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
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