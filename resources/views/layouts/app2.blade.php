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
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/css/froala_editor.pkgd.min.css" rel="stylesheet"
        type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    




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

                @include('layouts.nav')

            </div> <!-- header-content -->
        </header> <!-- header -->

    </div> <!-- end s-pageheader -->


    <!-- s-content
    ================================================== -->
    <section class="">

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
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>

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