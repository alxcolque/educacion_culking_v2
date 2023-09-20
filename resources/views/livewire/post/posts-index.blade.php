<div class="row">
    @if ($posts->count())
        @foreach ($posts as $post)
            <div class="col-md-3 mb-3 mb-sm-0">
                <div class="card card-posts mt-4">
                    <a href="{{ route('posts.slug', $post->slug) }}" style="text-decoration: none;">

                        <div class="card-body truncated-card">
                            <img class="image-post" src="{{ $post->url }}" alt="" width="100%" loading="lazy">
                            <div>
                                @php
                                    //$title = substr($post->name, 0, 15);
                                    $extr = substr($post->extract, 0, 39);
                                @endphp
                                <span style="color:#6095d1; text-transform: uppercase;">{{ $post->title }}</span>
                                <br>

                                {{-- <a href="{{ route('posts.slug', $post->slug) }}"
                                        class="text-light"></a> --}}
                                <p class="truncate1">
                                    {{ $post->extract }}
                                </p>
                                <small style="font-size:.7rem;">{{ $post->created_at }}</small>
                                <br>
                            </div>
                        </div>
                    </a>
                    <div class="card-footer">

                        <div class="d-flex d-flex justify-content-between align-items-start mr-2 mt-2">
                            @if ($post->status == 1)
                                <span class="badge rounded-pill text-bg-warning">EN BORRADOR</span>
                            @elseif ($post->status == 2)
                                <span class="badge rounded-pill text-bg-info">EN REVISIÓN</span>
                            @elseif ($post->status == 3)
                                <span class="badge rounded-pill text-bg-success">PUBLICADO</span>
                            @elseif ($post->status == 4)
                                <span class="badge rounded-pill text-bg-danger">RECHAZADO</span>
                            @elseif ($post->status == 5)
                                <span class="badge rounded-pill text-bg-secondary">INHABILITADO</span>
                            @else
                                <h3>No tenemos este tipo de opciones...</h3>
                            @endif

                            <div class="btn-group dropup">
                                {{-- class="dropdown-toggle"  --}}
                                <span class="h4" data-bs-toggle="dropdown" data-bs-display="static"
                                    aria-expanded="false">
                                    <i class='bx bx-dots-horizontal-rounded icon-text'></i>
                                </span>

                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm-end">
                                    <li><a class="dropdown-item" href="{{ route('posts.show', $post->id) }}">Previo</a>
                                    </li>
                                    @if ($post->status == 1)
                                        <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Editar</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                    href="{{ route('posts.publish', $post->id) }}"
                                                    onclick="return confirm('¿Quieres publicar ahora?')">Publicar</a>
                                            </li>
                                        <li>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Seguro quiere eliminar?')">Eliminar</button>
                                            </form>
                                        </li>
                                    @elseif ($post->status == 2)
                                        <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Cancelar</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Seguro quiere eliminar?')">Eliminar</button>
                                            </form>
                                        </li>
                                    @elseif ($post->status == 3)
                                        <li><a class="dropdown-item" href="{{ route('posts.disabled', $post->id) }}">Dar de baja</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('posts.slug', $post->slug) }}">Ver la publicación</a>
                                        </li>
                                    @elseif ($post->status == 4)
                                        <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Editar</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Seguro quiere eliminar?')">Eliminar</button>
                                            </form>
                                        </li>
                                    @elseif ($post->status == 5)
                                        <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Editar</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Seguro quiere eliminar?')">Eliminar</button>
                                            </form>
                                        </li>
                                    @else
                                        <h3>No tenemos este tipo de opciones...</h3>
                                    @endif


                                </ul>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        @endforeach
    @endif
    @if ($posts->count())
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro...</strong>

        </div>
    @endif
</div>
