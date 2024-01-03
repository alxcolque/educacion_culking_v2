@extends('layouts.front.app_base')
@section('twitter_title', $post->title)
@section('twitter_image', $post->url)

@section('fb_url', url('/noticias/', $post->slug))
@section('link_canonical', url('/noticias/', $post->slug))
@section('fb_title', $post->title)
@section('fb_image', $post->url)
@section('fb_description', $post->extract)
@section('description', $post->extract)
@section('title')
    {{ $post->title }}
@endsection
@section('published_time', $post->created_at)
@section('modified_time', $post->updated_at)
@section('author', $post->user->username)
@section('menu')
    @include('layouts.front.menu')
@endsection
@section('content')
    <div class="col-md-12 ms-sm-auto col-lg-12 px-md-5">
        <div class="container mt-3">
            <a href="{{ route('posts.all') }}">Atrás</a>
            <div class="row">
                <div class="col-md-10">
                    <h3>{{ $post->title }}</h3>
                    <div class="section">
                        <div class="likeShareBtnmt-3">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0"
                                nonce="ccaa4s"></script>
                            <div class="fb-like" data-layout="standard" data-action="like" data-size="large"
                                data-show-faces="true" data-href="{{ url('/', $post->slug) }}" data-share="true">
                            </div>
                        </div>
                        {!! Share::page(url('/noticias/' . $post->slug))->facebook()->twitter()->whatsapp()->telegram()->linkedin()->reddit() !!}
                    </div>


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
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous"
                        src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v18.0&appId=3052783371678638&autoLogAppEvents=1"
                        nonce="cgZt75Gf"></script>
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                        data-width="" data-numposts="5"></div>
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
<script type="text/javascript">
    // jQuery used as an example of delaying until load.
    $(function() {
        // Build url params and make the ad call
        var data = <?php echo json_encode($codes); ?>;
        Object.keys(data).forEach(function(key, value) {
            //console.log('Key : ' + key + ', Value : ' + data[key].html_id)
            postscribe('#'+data[key].html_id, '<script src="'+data[key].gist_link+'">)<\/script>');
        })
        //postscribe('#codigo2', '<script src="https://gist.github.com/alxcolque/7db40d582b56374c53b41427b4c94564.js">)<\/script>');

    });
</script>
@stop
