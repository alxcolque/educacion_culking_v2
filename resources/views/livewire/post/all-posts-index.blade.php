<div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el título de un post">
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>Nro</th>
                <th>Usuario</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($allposts as $post)
                   <tr>
                        <td>{{$i++}}</td>
                        <td><span class="badge rounded-pill text-bg-primary">{{$post->user->username}}</span></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->type}}</td>
                        <td>
                            @if ($post->status == 1)
                                <span class="badge rounded-pill text-bg-warning">EN BORRADOR</span>
                            @elseif ($post->status == 2)
                                <span class="badge rounded-pill text-bg-info">EN REVISIÓN</span>
                            @elseif ($post->status == 3)
                                <span class="badge rounded-pill text-bg-success">PUBLICADO</span>
                            @elseif ($post->status == 4)
                                <span class="badge rounded-pill text-bg-danger">RECHAZADO</span>
                            @elseif ($post->status == 5)
                                <span class="badge rounded-pill text-bg-danger">INHABILITADO</span>
                            @else
                                <h3>No tenemos este tipo de opciones...</h3>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                {{-- class="dropdown-toggle"  --}}
                                <span class="h4" data-bs-toggle="dropdown" data-bs-display="static"
                                    aria-expanded="false">
                                    <i class='bx bx-cog'></i>
                                </span>

                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm-end">

                                    <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Editar</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('posts.show', $post->id) }}">Previo</a>
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
                                    @if ($post->status == 2)
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('posts.approve', $post->id) }}" onclick="return confirm('Seguro quiere aprobar este post?')">Aceptar</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('posts.fail', $post->id) }}" onclick="return confirm('Seguro quiere rechazar este post?')">Rechazar</a>
                                        </li>
                                    @endif
                                    @if ($post->status == 3)
                                        <li><a class="dropdown-item" href="{{ route('posts.disabled', $post->id) }}" onclick="return confirm('Se desabilitará el post..')">Dar de baja</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
