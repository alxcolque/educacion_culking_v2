<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ config('institution.logo') }}" alt="" height="50" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-host">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{request()->is('/')? 'active':''}}"><a class="nav-link" href="/">Inicio</a></li>
                    <li class="nav-item {{request()->is('noticias')? 'active':''}}"><a class="nav-link" href="{{request()->is('/')?'#news':'/noticias'}}">Noticias</a></li>
                    <li class="nav-item dropdown {{request()->is(['cursos','tutoriales'])?'active':''}}">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Cursos </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="/#course">Más Recientes </a>
                            <a class="dropdown-item {{request()->is('tutoriales')?'active':''}}" href="/tutoriales">Tutoriales </a>
                            <a class="dropdown-item {{request()->is('cursos')?'active':''}}" href="/cursos">Todos los cursos </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{request()->is('unidad-educativa')?'active':''}}">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Unidad </a>
                        @livewire('post.unit')

                    </li>
                    <li class="nav-item {{request()->is('tramites')?'active':''}}"><a class="nav-link" href="/tramites">Trámites</a></li>
                    <li class="nav-item {{request()->is('acercade')?'active':''}}"><a class="nav-link" href="/#about">Acerca de</a></li>
                    <li class="nav-item {{request()->is('contactos')?'active':''}}"><a class="nav-link" href="/#footer">Contactos</a></li>
                </ul>
                @guest
                    @php
                        $dev = env('APP_ENV');
                    @endphp
                    @if ($dev == 'local')
                        {{-- <a class="btn btn-outline-secondary btn-sm me-2" href="/login">{{ __('Iniciar sesión') }}</a> --}}

                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li>
                        </ul>
                    @else
                        <a class="btn btn-outline-secondary btn-sm me-2"
                            href="https://cuenta.culking.com/">{{ __('Iniciar sesión') }}</a>
                    @endif
                @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle" href="#"
                            id="dropdown-a" data-toggle="dropdown">
                            <small>{{Auth::user()->username}}</small>
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="" width="32" height="32" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="dropdown-a">

                            <a class="dropdown-item" href="{{ url('home') }}">
                                <i class='bx bx-home'></i> {{ __('Principal') }}
                            </a>
                            @role('editor')
                            <a class="dropdown-item" href="{{ url('posts') }}">
                                <i class='bx bx-run'></i> {{ __('Publicaciones') }}
                            </a>
                            @endrole
                            @role('admin')
                            <a class="dropdown-item" href="{{ url('posts') }}">
                                <i class='bx bx-run'></i> {{ __('Publicaciones') }}
                            </a>
                            <a class="dropdown-item" href="{{ url('carrusels') }}">
                                <i class='bx bx-slider'></i> {{ __('Carruseles') }}
                            </a>
                            <a class="dropdown-item" href="{{ url('categories') }}">
                                <i class='bx bx-certification'></i> {{ __('Categoría') }}
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class='bx bx-purchase-tag-alt'></i> {{ __('Etiquetas') }}
                            </a>
                            <a class="dropdown-item" href="{{ url('users') }}">
                                <i class='bx bxs-user'></i> {{ __('Usuarios') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('roles.index') }}">
                                <i class='bx bx-award'></i> {{ __('Roles') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('permissions.index') }}">
                                <i class='bx bx-key'></i>{{ __('Permisos') }}
                            </a>
                            @endrole
                            @if (Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ url('https://cuenta.culking.com/logactivity') }}">
                                    <i class='bx bx-list-ol'></i> {{ __('Bitácora') }}
                                </a>
                            @endif

                            @php
                                $dev1 = env('APP_ENV')
                            @endphp
                            @if ($dev1 == 'local')
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class='bx bx-exit'></i> {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a class="dropdown-item" href="{{ url('https://cuenta.culking.com/logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class='bx bx-exit'></i> {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ url('https://cuenta.culking.com/logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            @endif
                        </div>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>
</header>

<!-- End header -->
