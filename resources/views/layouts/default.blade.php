<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description"
          content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords"
          content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">

    <title>Room Expenses: @yield('page_title')</title>
    <!-- Favicons-->
    <link rel="icon" href="{{ asset('template/images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <!-- Favicons-->

    <link rel="apple-touch-icon-precomposed" href="{{ asset('template/images/favicon/apple-touch-icon-152x152.png') }}">

    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{ asset('template/images/favicon/mstile-144x144.png') }}">
    <!-- For Windows Phone -->

    <!-- CORE CSS-->
    <link href="{{ asset('template/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('template/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('template/css/custom.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('template/css/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('template/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css"
          rel="stylesheet" media="screen,projection">
    <link href="{{ asset('template/js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection">
@yield('page_style')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
    </script>
</head>
<body>
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->

@include('layouts.header')

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
    @include('layouts.leftsidebar')
    <!-- START CONTENT -->
        <section id="content">
            @yield('content')
        </section>
        @include('layouts.rightsidebar')
    </div>
</div>

<!-- START FOOTER -->
<footer class="mdl-mini-footer page-footer">
    <div class="footer-copyright">
        <div class="container">
            <span>Copyright © 2017 <a class="grey-text text-lighten-4" href="http://navin.comze.com" target="_blank">Room</a> All rights reserved.</span>
            <span class="right"> Design and Developed by <a class="grey-text text-lighten-4"
                                                            href="http://navin.comze.com">Navin</a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!-- jQuery Library -->
<script type="text/javascript" src="{{ asset('template/js/jquery-1.11.2.min.js') }}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{ asset('template/js/materialize.js') }}"></script>
<!--prism-->
<script type="text/javascript" src="{{ asset('template/js/prism.js') }}"></script>
<!--scrollbar-->
<script type="text/javascript"
        src="{{ asset('template/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!-- chartist -->
<script type="text/javascript"
        src="{{ asset('template/js/plugins/chartist-js/chartist.min.js') }}"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{ asset('template/js/plugins.js') }}"></script>
@yield('page_script')
</body>
</html>