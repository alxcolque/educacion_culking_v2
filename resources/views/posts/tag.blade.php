@extends('layouts.app')

@section('title')
    Noticias
@endsection
@section('menu')
    @include('layouts.menu')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 ms-sm-auto col-lg-12 px-md-5">
            <div class="container mt-3">
                <a href="{{route('posts.all')}}">Atrás</a>
                @if ($posts->count())


                <h3>Etiqueta: {{$tag->name}}</h3>
                @include('posts.partials.cards')
                @else
                <div class="alert alert-warning" role="alert">
                    No existe noticias con esta categoría.
                  </div>
                @endif

            </div>
        </div>

    </div>


@stop
@section('css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Style cards news */

        .card-posts {
            transition: transform 0.3s ease;
        }

        .card-posts:hover {
            transform: scale(1.05);
        }

        .card-posts:hover .truncated-card div .truncate1 {
            overflow: visible;
            white-space: normal;
            font-size: .8rem;
            max-width: 400%;
            width: 100%;
            z-index: 1;
        }

        .image-post:hover {
            filter: opacity(.4);
        }
        .truncate1 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .card-posts {
                height: 250px;
            }

            .image-post {
                width: 100%;
                height: 50%;
            }
        }
    </style>
@stop

@section('js')

@stop
