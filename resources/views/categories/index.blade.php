<!-- index.blade.php -->

@extends('layouts.app')

@section('title')
    Culking | Categories
@stop

@section('menu')
    @include('layouts.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.alerts')
                <h1>Categories</h1>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Icon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    @if ($category->icon)
                                        <img src="{{ $category->icon }}" class="card-img-top"
                                            alt="category Cover" height="40">
                                    @else
                                        <img src="https://cdn.pixabay.com/photo/2022/06/01/05/52/fruit-7234847_640.jpg"
                                            class="card-img-top" alt="Default Image" height="40">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection
