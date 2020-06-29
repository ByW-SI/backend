<nav class="header__nav-wrap">

        <h2 class="header__nav-heading h6">Premium Wine Makers</h2>

        <ul class="header__nav">

            @guest
            <li><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
            {{-- <li><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li> --}}

            @else

            <li class="current">
            <li class="has-children">
                <a href="#0" title="">{{ Auth::user()->name }}</a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            </li>

            @endguest

            @auth

            @if ( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','enologos')->first() )
            <li class="current"><a href="{{ route('enologos.index') }}" title="">Enólogos</a></li>
            @endif

            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','vinicolas')->first() )
            <li class="current"><a href="{{ route('vinicolas.index') }}" title="">Vinicolas</a></li>
            @endif

            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','bodegas')->first() )
            <li class="current"><a href="{{ route('bodegas.index') }}" title="">Bodegas</a></li>
            @endif

            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','barricas')->first() )
            <li class="current"><a href="{{ route('barricas.index') }}" title="">Barricas</a></li>
            @endif
            
            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','uvas')->first() )
            <li class="has-children">
                <a href="#0" title="">Uvas</a>
                <ul class="sub-menu">
                    <li><a href="{{route('uvas.create')}}">Agregar Uva</a></li>
                    <li><a href="{{route('uvas.index')}}">Variedad de uvas</a></li>
                </ul>
            </li>
            @endif
            
            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','ofertas')->first() )
            <li class="has-children">
                <a href="#0" title="">Ofertas</a>
                <ul class="sub-menu">
                    <li><a href="{{route('ofertas.create')}}">Agregar Oferta</a></li>
                    <li><a href="{{route('ofertas.index')}}">Lista de ofertas</a></li>
                    <li><a href="{{route('paquetes.index')}}">Lista de paquetes</a></li>
                </ul>
            </li>
            @endif
            
            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','viajes y cursos')->first() )
            <li class="has-children">
                <a href="#0" title="">Viajes y cursos</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('viajes') }}">Nuevo viaje</a></li>
                    <li><a href="{{ route('cursos') }}">Nuevo curso</a></li>
                </ul>
            </li>
            @endif

            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','usuarios')->first() )
            <li class="has-children">
                <a href="#0" title="">Usuarios</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('empleados.create') }}">Agregar empleados</a></li>
                    <li><a href="{{ route('empleados.index') }}">Lista de empleados</a></li>
                    <li><a href="{{ route('perfiles.index') }}">Lista de perfiles</a></li>
                </ul>
            </li>
            @endif

            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','reportes')->first() )
            <li class="has-children">
                <a href="#0" title="">Reportes</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('clientes') }}">Clientes</a></li>
                    <li><a href="{{ route('ventas') }}">Ventas</a></li>
                    <li><a href="{{ route('puntos_corchos') }}">Puntos Corchos</a></li>
                </ul>
            </li>
            @endif
            
            @if( Auth::user()->es_admin || Auth::user()->perfil->secciones()->where('nombre','noticias')->first() )
            <li class="has-children">
                <a href="#0" title="">Noticias</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('posts.index') }}">Noticias</a></li>
                    <li><a href="{{ route('posts.create') }}">Nueva noticia</a></li>
                </ul>
            </li>
            @endif

            @endauth
            {{-- @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a></li>
            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a></li>
            @else
            <li class="has-children">
                <a href="#0">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="sub-menu">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
            @endguest --}}


        </ul> <!-- end header__nav -->

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Cerrar</a>

    </nav> <!-- end header__nav-wrap -->