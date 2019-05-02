<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- Begin Head -->

<!-- Mirrored from kamleshyadav.com/html/miraculous/version1/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Aug 2018 01:11:14 GMT -->
<head>
    <title>
        @section('title_page')
            Music
        @show
    </title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Music">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <!--Start Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset(config('bower.home_css') . 'fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('bower.home_css') . 'bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('bower.home_css') . 'font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('bower.home_js') . 'plugins/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('bower.home_js') . 'plugins/nice_select/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('bower.home_js') . 'plugins/player/volume.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('bower.home_js') . 'plugins/scroll/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('bower.home_css') . 'style.css') }}">
    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="{{ asset(config('bower.home_images') . 'favicon.png') }}">
    @yield('style')
</head>

<body>
<!-- Loader Start -->
<div class="ms_loader">
    <div class="wrap">
        <img src="{{ asset(config('bower.home_images') . 'loader.gif') }}" alt="">
    </div>
</div>
<!-- Main Wrapper Start -->
<div class="ms_main_wrapper">
    <!-- Side Menu Start -->
    @include('home.layouts.sidemenu')
    <!-- Main Content Start -->
    @yield('content')
    <!-- Footer Start -->
    @include('home.layouts.footer')
    <!-- Audio Player Section -->
    {{--@include('home.layouts.player')--}}
</div>
<!-- Register Modal Start -->
@include('home.layouts.modal')
<!--Main js file Style-->
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'plugins/swiper/js/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'plugins/player/jplayer.playlist.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'plugins/player/jquery.jplayer.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'plugins/player/audio-player.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'plugins/player/volume.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'plugins/nice_select/jquery.nice-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'plugins/scroll/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('bower.home_js') . 'custom.js') }}"></script>
@yield('script')
</body>

</html>
