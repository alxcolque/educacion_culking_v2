@extends('layouts.app')

@section('title')
   Culking - publicaciones
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
                <h3>Publicaciones </h3>
                <a class="btn btn-success btn-submit" href="{{ route('posts.create') }}"><i
                        class='bx bxs-plus-circle'></i>
                    Nuevo</a>

                @livewire('post.posts-index')
                @role('admin')
                    @livewire('post.all-posts-index')
                @endrole

            </div>
        </div>
    </div>
@stop

@section('css')
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
