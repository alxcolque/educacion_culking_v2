<div class="dropdown-menu" aria-labelledby="dropdown-a">
    @foreach ($units as $unit)
        <a class="dropdown-item" href="{{route('posts.slug', $unit->slug)}}">{{$unit->title}} </a>
    @endforeach
</div>
