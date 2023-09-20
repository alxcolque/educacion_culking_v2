@extends('layouts.app')

@section('title')
    Inicio Carruseles
@endsection
@section('menu')
    @include('layouts.menu')
@endsection

@section('content')

    <div class="container mt-3">
        <a href="{{ route('home') }}">Atrás</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.alerts')
                <div class="card">

                    <div class="card-header">
                        <a class="btn btn-success" href="{{ route('carrusels.create') }}"><i class='bx bxs-plus-circle'></i>
                            Nuevo</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @php
                                    $index = 0;
                                    $index2 = 1;
                                @endphp
                                @foreach ($carrusels as $row)
                                    <button type="button" data-bs-target="#myCarousel"
                                        data-bs-slide-to="{{ $index++ }}" class="{{ $loop->first ? 'active' : '' }}"
                                        aria-current="true" aria-label="Slide {{ $index2++ }}"></button>
                                @endforeach
                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                                    aria-current="true" aria-label="Slide 1"></button>


                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>

                                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button> --
                            </div>
                            <div class="carousel-inner">
                                @foreach ($carrusels as $row)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset('/img/carrusels/' . $row->url_image) }}"
                                            alt="{{ $row->url_image }}" width="100%" height="100%">

                                        <div class="container">
                                            <div class="carousel-caption">
                                                <h1>{{ $row->title }}</h1>
                                                <p>{{ $row->description }}</p>
                                                <p><a class="btn btn-lg btn-success rounded-pill" href="{{ $row->url_button }}">{{ $row->title_button }}</a></p>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div> --}}
                        <hr>
                        <div class="container">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                @foreach ($carrusels as $row)
                                    <div class="col">
                                        <div class="card shadow-sm">

                                            <img src="{{ $row->url_image }}" alt="{{ $row->url_image }}" loading="lazy"
                                                class="img-fluid">
                                            <div class="text-light"
                                                style="
                                            @if ($row->visible == '1') background: #212529ad; @endif
                                            position: absolute;
                                            font-size: .7rem;
                                            top: 50%;
                                            left: 10px;">
                                                @if ($row->visible == '1')
                                                    <b>{{ $row->title }}</b>
                                                    <br>
                                                    <span>
                                                        {{ $row->description }}
                                                    </span>
                                                @endif
                                                <br>
                                                <a class="btn btn-lg btn-sm rounded-pill text-light"
                                                    style="background: {{ $row->color_button }};"
                                                    href="{{ $row->url_button }}">{{ $row->title_button }}</a>

                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a class="btn {{($row->status == '1')? 'btn-primary': 'btn-warning'}} btn-sm me-1"
                                                        href="{{ route('carrusels.edit', $row->id) }}"><i
                                                            class='bx bxs-pencil'></i></a>
                                                    <form action="{{ route('carrusels.destroy', $row->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            onclick="return confirm('¿Seguro que quiere eliminar este registro?')"
                                                            class="btn @if ($row->status == '1') btn-danger @endif btn-sm"><i
                                                                class='bx bxs-trash'></i></button>
                                                    </form>
                                                </div>
                                                @if ($row->status == '1')
                                                    <small class="text-secondary">
                                                        {{ $row->created_at }}
                                                    </small>
                                                @else
                                                    <small class="text-danger">
                                                        DESHABILITADO
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

    <style>
        /* Style edit */
        .heroContent {
            background: #212529ad;
            position: absolute;
            font-size: .7rem;
            top: 50%;
            left: 10px;
            /* transform: translate(0%, 100%); */
        }

        /* GLOBAL STYLES
            -------------------------------------------------- */
        /* Padding below the footer and lighter body text */

        /* body {
              padding-top: 3rem;
              padding-bottom: 3rem;
              color: rgb(var(--bs-tertiary-color-rgb));
            } */


        /* CUSTOMIZE THE CAROUSEL
            -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
            /* margin-bottom: 4rem; */
        }

        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
            bottom: 3rem;
            z-index: 10;
            background: #212529ad;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
            height: 25rem;
        }


        /* MARKETING CONTENT
            -------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        /* rtl:begin:ignore */
        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }

        /* rtl:end:ignore */


        /* Featurettes
            ------------------------- */

        .featurette-divider {
            margin: 5rem 0;
            /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        /* rtl:begin:remove */
        .featurette-heading {
            letter-spacing: -.05rem;
        }

        /* rtl:end:remove */

        /* RESPONSIVE CSS
            -------------------------------------------------- */

        @media (min-width: 40em) {

            /* Bump up size of carousel content */
            .carousel-caption p {
                margin-bottom: 1.25rem;
                font-size: 1.25rem;
                line-height: 1.4;
            }

            .featurette-heading {
                font-size: 50px;
            }
        }

        @media (min-width: 62em) {
            .featurette-heading {
                margin-top: 7rem;
            }
        }

        @media (max-width: 575.98px) {
            .bd-placeholder-img {
                height: 200px;
                width: 100%;
            }
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .bd-placeholder-img {
                height: 70%;
                width: 100%;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .bd-placeholder-img {
                height: 80%;
                width: 100%;
            }
        }

        @media (min-width: 992px) and (max-width: 1199.98px) {
            .bd-placeholder-img {
                height: 90%;
                width: 100%;
            }
        }
    </style>
@stop

@section('js')
@stop
