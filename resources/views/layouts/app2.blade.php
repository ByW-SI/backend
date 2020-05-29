<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/fileinput.css') }}"> --}}
    <!-- Include Editor style. -->
     <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />




    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

</head>

<body id="top">

    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader">

         <header class="header">
            <div class="header__content">

                <div class="header__logo">
                    <a class="logo" href="{{ url('/home') }}">
                        <img src="{{ asset('images/PWMDegradadosFondoNegro.png') }}" class="logo" alt="Homepage">
                    </a>
                </div> 

                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Premium Wine Makers</h2>

                    <ul class="header__nav">
                        <li class="current"><a href="{{ url('/') }}" title="">Principal</a></li>
                        <li class="current"><a href="{{ route('enologos.index') }}" title="">Enólogos</a></li>
                        <li class="current"><a href="{{ route('vinicolas.index') }}" title="">Vinicolas</a></li>
                        <li class="current"><a href="{{ route('bodegas.index') }}" title="">Bodegas</a></li>
                        {{-- <li class="current"><a href="{{ route('productores.index') }}" title="">Productores</a></li> --}}
                        <li class="current"><a href="{{ route('barricas.index') }}" title="">Barricas</a></li>
                        <li class="has-children">
                            <a href="#0" title="">Uvas</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('uvas.create')}}">Agregar Uva</a></li>
                                <li><a href="{{route('uvas.index')}}">Variedad de uvas</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#0" title="">Ofertas</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('ofertas.create')}}">Agregar Oferta</a></li>
                                <li><a href="{{route('ofertas.index')}}">Lista de ofertas</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#0" title="">Viajes y cursos</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('viajes') }}">Nuevo viaje</a></li>
                                <li><a href="{{ route('cursos') }}">Nuevo curso</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#0" title="">Usuarios</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('empleados.create') }}">Agregar empleados</a></li>
                                <li><a href="{{ route('empleados.index') }}">Lista de empleaods</a></li>
                            </ul>
                        </li>
                         <li class="has-children">
                            <a href="#0" title="">Reportes</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('clientes') }}">Clientes</a></li>
                                <li><a href="{{ route('ventas') }}">Ventas</a></li>
                                <li><a href="{{ route('puntos_corchos') }}">Puntos Corchos</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#0" title="">Noticias</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('posts.index') }}">Noticias</a></li>
                                <li><a href="{{ route('posts.create') }}">Nueva noticia</a></li>
                            </ul>
                        </li>
                        {{-- @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a></li>
                        @else
                            <li class="has-children">
                                <a href="#0">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="sub-menu">
                                    <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest --}}
            
                        
                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Cerrar</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->

    </div> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow">

        <main class="py-4" id="app">
            @yield('content')
        </main>

    </section> <!-- s-content -->


    


   

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    
   <!-- JavaScripts -->
   <!-- script
    ================================================== -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include Editor JS files. -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>

      <!-- Initialize the editor. -->
      <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
        new FroalaEditor('#body', {
          // Set the file upload URL.
          imageUploadURL: "{{ route('posts.imageUpload') }}",

          imageUploadParams: {
            id: 'my_editor'
          },

          videoUploadURL: "{{ route('posts.videoUpload') }}",
          videoUploadParams: {
            id: 'my_editor'
          },
          fileUploadURL: "{{ route('posts.fileUpload') }}",

          fileUploadParams: {
            id: 'my_editor'
          }
        })
      </script>
   <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>


    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/piexif.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/purify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/sortable.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/locales/es.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fileinput.min.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <!-- Include JS file. -->
    @yield('script')
</body>

</html>