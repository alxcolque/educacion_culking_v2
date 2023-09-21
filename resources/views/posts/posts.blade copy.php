@extends('layouts.app')

@section('title')
    Noticias
@endsection
@section('menu')
    @include('layouts.menu')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 ms-sm-auto col-lg-3 px-md-5">
            <div class="container mt-3">
                <h4>Categorías</h4>
                @foreach ($categories as $category)
                    <a href="{{route('posts.category',$category)}}"><span class="badge rounded-pill text-bg-secondary">{{$category->title}}</span></a>
                @endforeach
                <h4>Etiquetas</h4>
                @foreach ($tags as $tag)
                    <a href="{{route('posts.tag',$tag)}}"><span class="badge rounded-pill text-bg-primary">#{{$tag->name}}</span></a>
                @endforeach
            </div>
        </div>
        <div class="col-md-9 ms-sm-auto col-lg-9 px-md-5">
            <div class="container mt-3">
                <a href="/">Atrás</a>
                <h3>TODAS LAS NOTICIAS</h3>
                @livewire('post.posts')

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
        /* .contenedor-image{
            position: relative;
            display: inline-block;
            text-align: center;
        }


        .centrado{
            position: absolute;
            top: 50%;
            left: 20px;
        } */
    </style>
@stop

@section('js')

@stop
