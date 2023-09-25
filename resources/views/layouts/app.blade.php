<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="index,follow" />

    <meta name="twitter:title" content="@yield('twitter_title')">
    <meta name="twitter:image" content="@yield('twitter_image')">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@AlexisColqueCho" />

    <meta property="og:url" content="@yield('fb_url')" />
    {{-- <meta property="og:type" content="website" /> --}}
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('fb_title')" />
    <meta property="og:description" content="@yield('fb_description')" />
    <meta property="og:image" content="@yield('fb_image')" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <meta property="article:published_time" content="@yield('published_time')" />
    <meta property="article:modified_time" content="@yield('modified_time')" />

    <meta property="article:author" content="@yield('author')" />
    <meta property="article:section" content="Oruro" />
    {{-- <meta property="article:tag" content="precintan" />
    <meta property="article:tag" content="casa grande" />
    <meta property="article:tag" content="operativo policial" /> --}}

    <meta property="og:site_name" content="Culking" />


    {{-- <link rel="amphtml" href="https://eldeber.com.bo/amp/santa-cruz/precintan-el-centro-de-eventos-y-conciertos-casa-grande_340023"/> --}}
    <link rel="canonical" href="@yield('link_canonical')" />

    <meta name="description" content="@yield('description')" />
    <meta name="author" content="Alex Colque" />
    <meta name="generator" content="culking.com" />
    <meta name="keywords" content="Culking, Colque, venta, reservas, futbol, trabajos, noticias, desafíos" />
    <meta name="news_keywords" content="precintan,casa grande,operativo policial" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="https://culking.com/img/sys/Logo11.ico" />

    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="https://www.culking.com/css/style.css">
    @livewireStyles
    @yield('css')
</head>

<body>
    @yield('menu')
    <main class="section-c">
        @yield('sidebar')
        @yield('content')


    </main><br><br>
    <hr class="mt-5">

    @include('layouts.footer')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> --}}
    <script src="{{ asset('js/main.js') }}"></script>
    @livewireScripts
    @yield('js')
    <script async src="https://www.tiktok.com/embed.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/postscribe/2.0.8/postscribe.min.js"></script>
</body>

</html>
