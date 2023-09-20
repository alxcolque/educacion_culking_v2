@extends('layouts.app')

@section('title')
    Culking | Inicio
@stop

@section('menu')
    @include('layouts.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Principal') }}</div>

                    <div class="card-body">
                        <span>Bienvenido...</span>
                        <a href="{{route('institutions.edit',1)}}"> Ajustes del sistema</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('css')
@stop

@section('js')
@stop
