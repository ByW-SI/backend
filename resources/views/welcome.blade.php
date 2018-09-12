<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, , maximum-scale=1">

        <title>Premium Wine Makers</title>

        <!-- CSS -->

        <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

        <!--scripts-->

        <script src="{{ asset('js/modernizr.js') }}"></script>
        <script src="{{ asset('js/pace.min.js') }}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        
    </head>
    <body id="top">
         <!-- pageheader
    ================================================== -->
    <section class="s-pageheader s-pageheader--home">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="{{ url('/home') }}">
                        <img src="{{ asset('images/PWMDegradadosFondoNegro.png') }}"  alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Buscar:</span>
                            <input type="search" class="search-field" placeholder="¿Qué deseas buscar?" value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>
        
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>

                    <ul class="header__nav">
                        <li class="current"><a href="{{ url('/') }}" title="">Principal</a></li>
                        <li class="current"><a href="{{ route('enologos.index') }}" title="">Enólogos</a></li>
                        <li class="current"><a href="{{ route('vinicolas.index') }}" title="">Vinicolas</a></li>
                        <li class="current"><a href="{{ route('bodegas.index') }}" title="">Bodegas</a></li>
{{--                         <li class="current"><a href="{{ route('productores.index') }}" title="">Productores</a></li> --}}
                        <li class="current"><a href="{{ route('barricas.index') }}" title="">Barricas</a></li>
                        <li class="has-children">
                            <a href="#0" title="">Uvas</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('uvas.create')}}">Agregar Uva</a></li>
                                <li><a href="{{route('uvas.index')}}">Variedad de uvas</a></li>
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
            
                        
                    </ul>  <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->

{{-- 
        <div class="pageheader-content row">
            <div class="col-full">

                <div class="featured">

                    <div class="featured__column featured__column--big">
                        <div class="entry" style="background-image:url('images/thumbs/featured/featured-guitarman.jpg');">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Music</a></span>

                                <h1><a href="#0" title="">What Your Music Preference Says About You and Your Personality.</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">John Doe</a></li>
                                        <li>December 29, 2017</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                            
                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <div class="featured__column featured__column--small">

                        <div class="entry" style="background-image:url('images/thumbs/featured/featured-watch.jpg');">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Management</a></span>

                                <h1><a href="#0" title="">The Pomodoro Technique Really Works.</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">John Doe</a></li>
                                        <li>December 27, 2017</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                          
                        </div> <!-- end entry -->

                        <div class="entry" style="background-image:url('images/thumbs/featured/featured-beetle.jpg');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">LifeStyle</a></span>

                                <h1><a href="#0" title="">Throwback To The Good Old Days.</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">John Doe</a></li>
                                        <li>December 21, 2017</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div> <!-- end pageheader-content row -->
 --}}
    </section> <!-- end s-pageheader -->

        <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                    <h4>Ligas de interes</h4>

                    <ul class="s-footer__linklist">
                        <li><a href="#0">Home</a></li>
                        <li><a href="#0">Blog</a></li>
                        <li><a href="#0">Styles</a></li>
                        <li><a href="#0">About</a></li>
                        <li><a href="#0">Contact</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>

                </div> <!-- end s-footer__sitelinks -->


                <div class="col-two md-four mob-full s-footer__social">
                        
                    <h4>Social</h4>

                    <ul class="s-footer__linklist">
                        <li><a href="#0">Facebook</a></li>
                        <li><a href="#0">Instagram</a></li>
                        <li><a href="#0">Twitter</a></li>
                        <li><a href="#0">Pinterest</a></li>
                        <li><a href="#0">Google+</a></li>
                        <li><a href="#0">LinkedIn</a></li>
                    </ul>

                </div> <!-- end s-footer__social -->
                <div class="col-three md-four mob-full s-footer__archives">
                        
                    <p>“once in a time life wine experiencie”</p>

                    

                </div> <!-- end s-footer__archives -->

                <div class="col-four md-full end s-footer__subscribe">
                        
                    <h4>Our Newsletter</h4>

                    <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        <span>© Copyright B&W 2018</span> 
                      
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->

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
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
