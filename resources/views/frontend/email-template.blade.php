<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Yaramay">

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/themify/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/magnific-popup/magnific-popup.css')}}" />

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick-theme.css')}}" />

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">

     <!--Favicon-->
    <link rel="icon" href="{{ asset('assets/images/phil-logo.png')}}" type="image/x-icon">

</head>
<body>
    <div >



        <main class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Name: {{ $fromName }}</h3>
                                <h3>Contact Number: {{ $fromNumber }}</h3>
                                <h3>Subject: {{ $subject }}</h3>
                            </div>
                            <div class="card-body">
                                <h6>Message: {{$body}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


    </div>

    {{-- <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script> --}}
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script> --}}



    <!--  Magnific Popup-->
    <script src="{{ asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Slick Slider -->
    <script src="{{ asset('assets/plugins/slick/slick.min.js')}}"></script>

    <!-- Counterup -->
    <script src="{{ asset('assets/plugins/counterup/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

    <script src="{{ asset('assets/js/script.js')}}"></script>

</body>
</html>
