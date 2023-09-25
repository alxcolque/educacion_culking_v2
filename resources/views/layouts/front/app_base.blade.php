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
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <title>
        @yield('title')
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="/js/modernizer.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @livewireStyles
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @yield('css')
    <style>
        iframe {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="host_version">
    <!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header tit-up">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Customer Login</h4>
              </div>
              <div class="modal-body customer-box">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs">
                      <li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
                      <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                      <div class="tab-pane active" id="Login">
                            <form method="POST" action="{{ route('login') }}"role="form" class="form-horizontal">
                            @csrf
                              <div class="form-group">
                                  <div class="col-sm-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-10">
                                      <button type="submit" class="btn btn-light btn-radius btn-brd grd1">
                                          Entrar
                                      </button>
                                      <a class="for-pwd" href="javascript:;">Olvidaste tu contraseña?</a>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <div class="tab-pane" id="Registration">
                          <form role="form" class="form-horizontal">
                              <div class="form-group">
                                  <div class="col-sm-12">
                                      <input class="form-control" placeholder="Name" type="text">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-12">
                                      <input class="form-control" id="email" placeholder="Email" type="email">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-12">
                                      <input class="form-control" id="mobile" placeholder="Mobile" type="email">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-12">
                                      <input class="form-control" id="password" placeholder="Password" type="password">
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-10">
                                      <button type="button" class="btn btn-light btn-radius btn-brd grd1">
                                          Save &amp; Continue
                                      </button>
                                      <button type="button" class="btn btn-light btn-radius btn-brd grd1">
                                          Cancel</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>

    @yield('menu')

    @yield('content')

    @include('layouts.front.footer')

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/js/custom.js"></script>
	<script src="/js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
        }
	</script>
    @livewireScripts
    @yield('js')
    <script async src="https://www.tiktok.com/embed.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/postscribe/2.0.8/postscribe.min.js"></script>
</body>
</html>
