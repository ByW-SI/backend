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


    <body id="top" class="  pace-done" data-aos-easing="ease-in-sine" data-aos-duration="600" data-aos-delay="100"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>

    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader">

         <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="{{ url('/home') }}">
                        <img src="{{ asset('images/PWMDegradadosFondoNegro.png') }}" style="max-width: 17%;height: auto;"  alt="Homepage">
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


                

            </div> <!-- header-content -->
        </header> <!-- header -->

    </div> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">

        <div class="row narrow">
            <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
                <h1>{{strtoupper($name)}}</h1>
            </div>
        </div>

        <div class="row masonry-wrap">
            <div class="masonry" style="position: relative">

                <div class="grid-sizer"></div>
                @foreach ($posts as $post)
                    {{-- expr --}}
                    <article class="masonry__brick entry format-standard aos-init aos-animate" data-aos="fade-up" style="position: absolute; left: 0%; top: 0px;">

                        @if ($post->image_path)
                            <div class="entry__thumb">
                                <a href="{{ route('posts.slug',['slug'=>$post->slug]) }}" class="entry__thumb-link">
                                        {{-- expr --}}
                                    <img src="{{ url('/storage/'.$post->image_path) }}" alt="">
                                </a>
                            </div>
                        @endif

                        <div class="entry__text">
                            <div class="entry__header">

                                <div class="entry__date">
                                    <a href="single-standard.html">{{date('M d, Y', strtotime($post->updated_at))}}</a>
                                </div>
                                <h1 class="entry__title"><a href="{{ route('posts.slug',['slug'=>$post->slug]) }}">{{$post->title}}</a></h1>

                            </div>
                            <div class="entry__meta">
                                <span class="entry__meta-links">
                                    @forelse ($post->categorias as $categoria)
                                        <a href="{{ route('posts.categorias.slug',['slug'=>$categoria->slug]) }}" class="btn btn-primary">{{$categoria->name}}</a>
                                    @empty
                                        No tiene categorias
                                    @endforelse
                                    @forelse ($post->tags as $tag)
                                        <a href="{{ route('posts.etiquetas.slug',['slug'=>$tag->slug]) }}" class="btn btn-primary" target="_blank">#{{$tag->name}}</a>
                                        {{-- expr --}}
                                    @empty
                                        No tiene etiquetas
                                    @endforelse
                                </span>
                            </div>
                        </div>

                    </article> <!-- end article -->
                @endforeach

                

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

    </section> <!-- s-content -->


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
