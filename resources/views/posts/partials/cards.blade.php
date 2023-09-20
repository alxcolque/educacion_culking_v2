<div class="row">

    {{-- @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->extract}}</p>

                    <div class="likeShareBtnmt-3">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="ccaa4s"></script>
                        <div
                            class="fb-like"
                            data-layout="standard"
                            data-action="like"
                            data-size="large"
                            data-show-faces="true"
                            data-href="https://eldeber.com.bo/santa-cruz/precintan-el-centro-de-eventos-y-conciertos-casa-grande_340023"
                            data-share="true">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}


    @foreach ($posts as $post)
    <div class="col-md-3 mb-3 mb-sm-0">
        <a href="{{ route('posts.slug', $post->slug) }}" style="text-decoration: none;">
            <div class="card card-posts mt-4">
                <div class="card-body truncated-card">

                    <img class="image-post" src="{{ $post->url }}" alt="" width="100%"
                        loading="lazy">

                    <div>
                        @php
                            //$title = substr($post->name, 0, 15);
                            $extr = substr($post->extract, 0, 39);
                        @endphp
                        <span
                            style="color:#4380c5; text-transform: uppercase;">{{ $post->title }}</span>
                        <br>

                        {{-- <a href="{{ route('posts.slug', $post->slug) }}"
                            class="text-light"></a> --}}
                        <p class="truncate1">
                            {{ $post->extract }}
                        </p>
                        {{-- @foreach ($post->tags as $tag)
                            <a class="truncate1" href="{{route('posts.tag',$tag)}}"><span class="badge rounded-pill text-bg-primary">#{{$tag->name}}</span></a>
                        @endforeach
                        <br> --}}
                        <small style="font-size:.7rem;">{{ $post->created_at }}</small>
                        <br>
                    </div>
                </div>
            </div>

        </a>
    </div>
    @endforeach
    @if ($posts->count())
        {{ $posts->links() }}
    @else
        <div class="card-body">
            <strong>No hay ningún registro...</strong>
        </div>
    @endif

</div>
