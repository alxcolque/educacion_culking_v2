@extends('layouts.app')

@section('title')
    Culking | Inicio
@stop

@section('menu')
    @include('layouts.menu')
@endsection
@section('content')
    <div class="container mt-3">

        <div class="bg-light p-4 rounded">
            <h1>Users</h1>
            <div class="lead">
                Manage your users here.
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Add new user</a>
            </div>

            <div class="mt-2">
                @include('layouts.alerts')
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="10%">Username</th>
                        <th scope="col" width="10%">Roles</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onclick="return confirm('¿Seguro que quiere eliminar este usuario?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class='bx bxs-trash' ></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex">
                {!! $users->links() !!}
            </div>

        </div>
    </div>
@endsection
@section('css')

@stop

@section('js')

@stop
