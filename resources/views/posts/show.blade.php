@extends('layouts.app')
@section('meta')
<meta property="og:url"                content="{{url('/noticias/',$post->slug)}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{$post->title}}" />
<meta property="og:description"        content="{{$post->extract}}" />
<meta property="og:image"              content="{{$post->url}}" />
@endsection
@section('title')
    {{ $post->slug }}
@endsection
@section('menu')
    @include('layouts.menu')
@endsection
@section('content')
    <div class="col-md-12 ms-sm-auto col-lg-12 px-md-5">
        <div class="container mt-3">
            <a href="{{ route('posts.all') }}">Atrás</a>
            <div class="row">
                <div class="col-md-10">
                    <h3>{{ $post->title }}</h3>
                    {!! Share::page(url('/noticias/' . $post->slug))->facebook()->twitter()->whatsapp()->telegram()->linkedin()->reddit() !!}
                    <span>{{ $post->extract }}</span>
                    <div class="section">
                        <img class="img-fluid" src="{{ $post->url }}" alt="">
                        <br>
                        <small class="text-secondary">{{ $post->image_author }}</small>
                    </div>
                    <p>Categoria: <span class="text-secondary">{{ $post->category->title }}</span></p>
                    @php
                        /* Convertimos la fecha a marca de tiempo */
                        $marca = strtotime($post->created_at);
                        $date = date('d F Y, h:i:s A', $marca);
                    @endphp
                    <p>Editador por: <span class="text-secondary"> {{ $post->user->username }}, el
                            {{ $date }}</span></p>
                    @foreach ($post->tags as $tag)
                        <a class="truncate1" href="{{ route('posts.tag', $tag) }}"><span
                                class="badge rounded-pill text-bg-primary">#{{ $tag->name }}</span></a>
                    @endforeach
                    <div class="only-this-horizon-scrollbar">
                        {!! $post->body !!}
                    </div>
                    <h3>Etiquetas relacionandas</h3>
                    @foreach ($post->tags as $tag)
                        <a class="truncate1" href="{{ route('posts.tag', $tag) }}"><span
                                class="badge rounded-pill text-bg-primary">#{{ $tag->name }}</span></a>
                    @endforeach
                    <br>
                </div>
                <div class="col-md-2">
                    <h5>Te puede Interesar</h5>
                    <ul>
                        @livewire('post.categoty-post', ['id' => $post->category_id, 'post_id' => $post->id])
                    </ul>
                </div>

            </div>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

        .div-trunc:hover li a .truncate1 {
            overflow: visible;
            white-space: normal;
            font-size: .8rem;
            max-width: 400%;
            width: 100%;
            z-index: 1;
        }

        .truncate1 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
        }
    </style>
@stop

@section('js')
@stop
