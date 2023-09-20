<div class="div-trunc">
    @foreach($posts as $item)
    <li>
        <a href="{{ route('posts.slug', $item->slug) }}">
            <strong>{{ $item->title }}</strong>
            <p class="truncate1">{{ $item->extract }}</p>
        </a>
        <hr>
    </li>
    @endforeach
</div>
