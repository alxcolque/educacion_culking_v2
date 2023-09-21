@extends('layouts.front.app_base')

@section('title')
    Culking | Educación
@stop

@section('menu')
    @include('layouts.front.menu')
@endsection
@section('content')


    @isset($carrusels)
        <div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover"
            data-interval="false">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                @php
                    $ictrl = 0;
                @endphp
                @foreach ($carrusels as $carrusel)
                    <li data-target="#carouselExampleControls" data-slide-to="{{ $ictrl++ }}"
                        class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach ($carrusels as $carrusel)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div id="home" class="first-section" style="background-image:url('{{ $carrusel->url_image }}');">
                            <div class="dtab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 text-{{ $carrusel->position }}">
                                            <div class="big-tagline">
                                                @if ($carrusel->visible == '1')
                                                    <h2><strong>Dirección Distrital</strong> {{ $carrusel->title }} </h2>
                                                    <p class="lead">{{ $carrusel->description }} </p>
                                                @endif
                                                @if ($carrusel->url_button)
                                                    {{-- <a href="{{ $carrusel->url_button }}" class="hover-btn-new"
                                                        style="background: {{ $carrusel->color_button }};"><span>{{ $carrusel->title_button }}</span></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                                    <a href="{{ $carrusel->url_button }}"
                                                        class="btn rounded-pill text-light" style="background: {{ $carrusel->color_button }};"><span>{{ $carrusel->title_button }}</span></a>
                                                @endif

                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                </div><!-- end container -->
                            </div>
                        </div><!-- end section -->
                    </div>
                @endforeach

                <!-- Left Control -->
                <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <!-- Right Control -->
                <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    @endisset
    <div id="about" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Acerca de nosotros</h3>
                </div>
            </div><!-- end title -->

                {!! config('institution.about') !!}
        </div><!-- end container -->
    </div><!-- end section -->

    @livewire('welcome.news-welcome')
    @livewire('welcome.course-welcome')

@stop

@section('css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css"
        rel="stylesheet" />
    {{-- <link rel="stylesheet" href="css/welcome.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> --}}
    <style>
        #social-links ul {
            padding-left: 0;
        }

        #social-links ul li {
            display: inline-block;
        }

        #social-links ul li a {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 1px;
            font-size: 25px;
        }

        #social-links .fa-facebook {
            color: #0d6efd;
        }

        #social-links .fa-twitter {
            color: deepskyblue;
        }

        #social-links .fa-linkedin {
            color: #0e76a8;
        }

        #social-links .fa-whatsapp {
            color: #25D366
        }

        #social-links .fa-reddit {
            color: #FF4500;
            ;
        }

        #social-links .fa-telegram {
            color: #0088cc;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script>
        /* const splide = new Splide(".splide", {
                    // Optional parameters
                    start: 1,
                    perPage: 1.5,
                    perMove: 1,
                    gap: 20,
                    type: "loop",
                    drag: "free",
                    snap: false,
                    interval: 3000,
                    arrows: true,
                    pagination: true,
                    rewind: true,
                    rewindByDrag: true,
                    lazyLoad: true,

                    // Responsive breakpoint
                    breakpoints: {
                        768: {
                            perPage: 1,
                            snap: true
                        }
                    }
                });
                splide.mount(); */
        /* news */
        $('#customers-testimonials').owlCarousel({
            loop: true,
            center: true,
            items: 4,
            margin: 20,
            autoplay: true,
            dots: false,
            nav: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            stopOnHover: true,
            smartSpeed: 850,
            navText: [
                '<i class="bx bxs-chevron-left" style="font-size:30px; border-radius: 50%;color: #0047ca;background: #229ce2"></i>',
                '<i class="bx bxs-chevron-right" style="font-size:30px; border-radius: 50%;color: #0047ca; background: #229ce2">'
            ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 4
                }
            }
        });
    </script>
@stop
