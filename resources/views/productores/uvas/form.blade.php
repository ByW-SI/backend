@extends('layouts.app2')
@section('content')
{{-- expr --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ $edit == false ? route('productores.uvas.store') : route('productores.uvas.update',['productorUva'=>$productor]) }}">
                        @csrf

                        @if ($edit == true)
                        {{-- expr --}}
                        <input type="hidden" name="_method" value="PUT">
                        @endif

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

                                            {{-- Nombre --}}


                                            <div class="col-12 col-md-4">
                                                <label for="nombre" class="">Nombre:</label>
                                                <input id="nombre" type="text"
                                                    class="form-control {{ $errors->has('nombre') ? ' is-invalid' : ''  }}"
                                                    name="nombre"
                                                    value="{{ $edit ? $productor->persona->nombre : old('nombre') }}" required autofocus="">
                                                @if ($errors->has('nombre'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("nombre")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- Apellido paterno --}}

                                            <div class="col-12 col-md-4">
                                                <label for="apellido_paterno" class="">Apellido paterno:</label>
                                                <input id="apellido_paterno" type="text"
                                                    class="form-control {{ $errors->has('apellido_paterno') ? ' is-invalid' : ''  }}"
                                                    name="apellido_paterno"
                                                    value="{{ $edit ? $productor->persona->apellido_paterno : old('apellido_paterno') }}" autofocus="">
                                                @if ($errors->has('apellido_paterno'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("apellido_paterno")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- Apellido materno --}}

                                            <div class="col-12 col-md-4">
                                                <label for="apellido_materno" class="">Apellido materno:</label>
                                                <input id="apellido_materno" type="text"
                                                    class="form-control {{ $errors->has('apellido_materno') ? ' is-invalid' : ''  }}"
                                                    name="apellido_materno"
                                                    value="{{ $edit ? $productor->persona->apellido_materno : old('apellido_materno') }}" required autofocus="">
                                                @if ($errors->has('apellido_materno'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("apellido_materno")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- Teléfono movil --}}

                                            <div class="col-12 col-md-4">
                                                <label for="celular" class="">Teléfono movil:</label>
                                                <input id="celular" type="number"
                                                    class="form-control {{ $errors->has('celular') ? ' is-invalid' : ''  }}"
                                                    name="celular"
                                                    value="{{ $edit ? $productor->persona->celular : old('celular') }}" required autofocus="">
                                                @if ($errors->has('celular'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("celular")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- Correo --}}

                                            <div class="col-12 col-md-4">
                                                <label for="correo" class="">Correo:</label>
                                                <input id="correo" type="email"
                                                    class="form-control {{ $errors->has('correo') ? ' is-invalid' : ''  }}"
                                                    name="correo"
                                                    value="{{ $edit ? $productor->persona->correo : old('correo') }}" required autofocus="">
                                                @if ($errors->has('correo'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("correo")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- 
								=========
								DIRECCIÓN
								=========
							--}}

                            <div class="col-12">
                                <h5 class="text-uppercase text-muted mt-2">
                                    <small>
                                        dirección
                                    </small>
                                </h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                            {{-- CALLE --}}


                                            <div class="col-12 col-md-4">
                                                <label for="calle" class="">Calle:</label>
                                                <input id="calle" type="text"
                                                    class="form-control {{ $errors->has('calle') ? ' is-invalid' : ''  }}"
                                                    name="calle" value="{{ $edit ? $productor->persona->direcciones()->first()->calle : old('calle') }}" required autofocus="">
                                                @if ($errors->has('calle'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("calle")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- NÚM. EXT --}}

                                            <div class="col-12 col-md-4">
                                                <label for="num_exterior" class="">Número exterior:</label>
                                                <input id="num_exterior" type="text"
                                                    class="form-control {{ $errors->has('num_exterior') ? ' is-invalid' : ''  }}"
                                                    name="num_exterior"
                                                    value="{{ $edit ? $productor->persona->direcciones()->first()->num_exterior : old('num_exterior') }}" required autofocus="">
                                                @if ($errors->has('num_exterior'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("num_exterior")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- NÚM. INT --}}

                                            <div class="col-12 col-md-4">
                                                <label for="num_interior" class="">Número interior:</label>
                                                <input id="num_interior" type="text"
                                                    class="form-control {{ $errors->has('num_interior') ? ' is-invalid' : ''  }}"
                                                    name="num_interior"
                                                    value="{{ $edit ? $productor->persona->direcciones()->first()->num_interior : old('num_interior') }}"
                                                    required autofocus="">
                                                @if ($errors->has('num_interior'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("num_interior")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- LOCALIDAD --}}

                                            <div class="col-12 col-md-4">
                                                <label for="localidad" class="">localidad:</label>
                                                <input id="localidad" type="text"
                                                    class="form-control {{ $errors->has('localidad') ? ' is-invalid' : ''  }}"
                                                    name="localidad"
                                                    value="{{ $edit ? $productor->persona->direcciones()->first()->localidad : old('localidad') }}"
                                                    required autofocus="">
                                                @if ($errors->has('localidad'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("localidad")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- CIUDAD --}}

                                            <div class="col-12 col-md-4">
                                                <label for="ciudad" class="">ciudad:</label>
                                                <input id="ciudad" type="text"
                                                    class="form-control {{ $errors->has('ciudad') ? ' is-invalid' : ''  }}"
                                                    name="ciudad"
                                                    value="{{ $edit ? $productor->persona->direcciones()->first()->ciudad : old('ciudad') }}"
                                                    required autofocus="">
                                                @if ($errors->has('ciudad'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("ciudad")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- municipio --}}

                                            <div class="col-12 col-md-4">
                                                <label for="municipio" class="">municipio:</label>
                                                <input id="municipio" type="text"
                                                    class="form-control {{ $errors->has('municipio') ? ' is-invalid' : ''  }}"
                                                    name="municipio"
                                                    value="{{ $edit ? $productor->persona->direcciones()->first()->municipio : old('municipio') }}"
                                                    required autofocus="">
                                                @if ($errors->has('municipio'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("municipio")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- estado --}}

                                            <div class="col-12 col-md-4">
                                                <label for="estado" class="">estado:</label>
                                                <input id="estado" type="text"
                                                    class="form-control {{ $errors->has('estado') ? ' is-invalid' : ''  }}"
                                                    name="estado"
                                                    value="{{ $edit ? $productor->persona->direcciones()->first()->estado : old('estado') }}"
                                                    required autofocus="">
                                                @if ($errors->has('estado'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("estado")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- codigo_postal --}}

                                            <div class="col-12 col-md-4">
                                                <label for="codigo_postal" class="">codigo_postal:</label>
                                                <input id="codigo_postal" type="number"
                                                    class="form-control {{ $errors->has('codigo_postal') ? ' is-invalid' : ''  }}"
                                                    name="codigo_postal" minlength="5" maxlength="5"
                                                    value="{{ $edit ? $productor->persona->direcciones()->first()->codigo_postal : old('codigo_postal') }}"
                                                    required autofocus="">
                                                @if ($errors->has('codigo_postal'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("codigo_postal")}}</strong>
                                                </span>
                                                @endif
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
                                        Empresa
                                    </small>
                                </h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                            {{-- NOMBRE --}}

                                            <div class="col-12 col-md-4">
                                                <label for="nombre_empresa" class="">Nombre:</label>
                                                <input id="nombre_empresa" type="text"
                                                    class="form-control {{ $errors->has('nombre_empresa') ? ' is-invalid' : ''  }}"
                                                    name="nombre_empresa"
                                                    value="{{ $edit ? $productor->persona->empresa->nombre : old('nombre_empresa') }}"
                                                    required autofocus="">
                                                @if ($errors->has('nombre_empresa'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("nombre_empresa")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- TELEFONO --}}

                                            <div class="col-12 col-md-4">
                                                <label for="telefono_empresa" class="">Teléfono:</label>
                                                <input id="telefono_empresa" type="text"
                                                    class="form-control {{ $errors->has('telefono_empresa') ? ' is-invalid' : ''  }}"
                                                    name="telefono_empresa"
                                                    value="{{ $edit ? $productor->persona->empresa->telefono : old('telefono_empresa') }}"
                                                    required autofocus="">
                                                @if ($errors->has('telefono_empresa'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("telefono_empresa")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- SITIO WEB --}}

                                            <div class="col-12 col-md-4">
                                                <label for="sitio_web_empresa" class="">Sitio web:</label>
                                                <input id="sitio_web_empresa" type="text"
                                                    class="form-control {{ $errors->has('sitio_web_empresa') ? ' is-invalid' : ''  }}"
                                                    name="sitio_web_empresa"
                                                    value="{{ $edit ? $productor->persona->empresa->sitio_web : old('sitio_web_empresa') }}"
                                                    required autofocus="">
                                                @if ($errors->has('sitio_web_empresa'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("sitio_web_empresa")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- INICIO DE OPERACIONES --}}

                                            <div class="col-12 col-md-4">
                                                <label for="fecha_inicio_operaciones_empresa" class="">Inicio de
                                                    operaciones:</label>
                                                <input id="fecha_inicio_operaciones_empresa" type="date"
                                                    class="form-control {{ $errors->has('fecha_inicio_operaciones_empresa') ? ' is-invalid' : ''  }}"
                                                    name="fecha_inicio_operaciones_empresa"
                                                    value="{{ $edit ? $productor->persona->empresa->inicio_operaciones : old('fecha_inicio_operaciones_empresa') }}"
                                                    required autofocus="">
                                                @if ($errors->has('fecha_inicio_operaciones_empresa'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("fecha_inicio_operaciones_empresa")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- 
								===================
								DATOS PROFESIONALES
								===================
							--}}

                            <div class="col-12">
                                <h5 class="text-uppercase text-muted mt-2">
                                    <small>
                                        Datos profesionales
                                    </small>
                                </h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                            

                                            {{-- INICIO ACTIVIDADES PROFESIONALES --}}

                                            <div class="col-12 col-md-6 mt-3">
                                                <label for="anio_inicio_actividades" class="">Inicio
                                                    actividades:</label>
                                                <input id="anio_inicio_actividades" type="text"
                                                    class="form-control {{ $errors->has('anio_inicio_actividades') ? ' is-invalid' : ''  }}"
                                                    name="anio_inicio_actividades"
                                                    value="{{ $edit ? $productor->persona->anio_inicio_actividades : old('anio_inicio_actividades') }}"
                                                    required autofocus="">
                                                @if ($errors->has('anio_inicio_actividades'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("anio_inicio_actividades")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- Semblanza profesional --}}

                                            <div class="col-12 col-md-6 mt-3">
                                                <label for="semblanza_profesional" class="">Semblanza
                                                    profesional:</label>
                                                <input id="semblanza_profesional" type="text"
                                                    class="form-control {{ $errors->has('semblanza_profesional') ? ' is-invalid' : ''  }}"
                                                    name="semblanza_profesional"
                                                    value="{{ $edit ? $productor->persona->semblanza_profesional : old('semblanza_profesional') }}"
                                                    required autofocus="">
                                                @if ($errors->has('semblanza_profesional'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("semblanza_profesional")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- 
								===================
								UVAS PRODUCIDAS
								===================
							--}}

                            <div class="col-12">
                                <h5 class="text-uppercase text-muted mt-2">
                                    <small>
                                        Uvas producidas
                                    </small>
                                </h5>
                                <div class="card">
                                    <div class="card-body">

                                        <button class="btn btn-primary" type="button" id="botonAnadirUva">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>

                                        <div class="row" id="contenedorUvas">

                                            {{-- Descripción --}}

                                            <div class="col-12 col-md-4 mt-3">
                                                <label for="tipo">Tipo de uva:</label>
                                                <select id="inputTipoUva" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    @foreach ($uvas as $uva)
                                                    <option value="{{$uva->id}}">{{$uva->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- HECTÁREAS --}}

                                            <div class="col-12 col-md-4 mt-3">
                                                <label for="hectareas" class="">Hectáreas</label>
                                                <input id="inputHectareas" type="text"
                                                    class="form-control {{ $errors->has('hectareas') ? ' is-invalid' : ''  }}"
                                                    value="{{ $edit ? $productor->hectareas : old('hectareas') }}"
                                                    required autofocus="">
                                                @if ($errors->has('hectareas'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("hectareas")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            {{-- UBICACIÓN PLANTÍO --}}

                                            <div class="col-12 col-md-4 mt-3">
                                                <label for="ubicacion_plantio" class="">Ubicación del plantío:</label>
                                                <input id="inputUbicacionPlantio" type="text"
                                                    class="form-control {{ $errors->has('ubicacion_plantio') ? ' is-invalid' : ''  }}"
                                                    value="{{ $edit ? $productor->ubicacion_plantio : old('ubicacion_plantio') }}"
                                                    required autofocus="">
                                                @if ($errors->has('ubicacion_plantio'))
                                                {{-- expr --}}
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first("ubicacion_plantio")}}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            @foreach ($productor->uvasProducidas as $uvaProducida)
                                                <div class="col-12 col-md-4 mt-3">
                                                    <label for="">Uva</label>
                                                    <input type="text" class="form-control" readonly value="{{$uvaProducida->uva->title}}">
                                                </div>
                                                <div class="col-12 col-md-4 mt-3">
                                                    <label for="">Hectareas</label>
                                                    <input type="text" class="form-control" readonly value="{{$uvaProducida->hectareas}}">
                                                </div>
                                                <div class="col-12 col-md-4 mt-3">
                                                    <label for="">Ubicación plantío</label>
                                                    <input type="text" class="form-control" readonly value="{{$uvaProducida->ubicacion_plantio}}">
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-right">
                                    Registrar productor
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




<script>


    $(document).on('click', '#botonAnadirUva', function(){
        tipoUva = $('#inputTipoUva option:selected').text();
        hectareas = $('#inputHectareas').val()
        ubicacionPlantio = $('#inputUbicacionPlantio').val()

        $('#contenedorUvas').append(`

            <div class="col-12 col-md-4 mt-3">
                <label for="tipo">Uva:</label>
                <input type="text" class="form-control" value="${tipoUva}" name="uvas_ids[]" readonly>
            </div>

            <div class="col-12 col-md-4 mt-3">
                <label for="tipo">Hectáreas:</label>
                <input type="text" class="form-control" value="${hectareas}" name="hectareas[]" readonly>
            </div>
            
            <div class="col-12 col-md-4 mt-3">
                <label for="tipo">Ubicación plantio:</label>
                <input type="text" class="form-control" value="${ubicacionPlantio}" name="ubicaciones_plantios[]" readonly>
            </div>


        `);

        console.table({
            tipoUva,
            hectareas,
            ubicacionPlantio
        })

    });

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