@extends('layouts.app')

@section('title')
    Editar Carruseles
@endsection
@section('menu')
    @include('layouts.menu')
@endsection

@section('content')

    <div class="container mt-3">
        <a href="{{ route('carrusels.index') }}">Atrás</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        Editor de Carrrusel
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{ route('carrusels.update', $carrusel->id) }}" autocomplete="off"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')
                            <p class="text-secondary">_____________Sección de la tarjeta transparente_____________</p>
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input class="form-control" placeholder="Ingrese el titulo del carrusel" name="title"
                                    type="text" id="title" value="{{ $carrusel->title }}" required
                                    onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" rows="3" placeholder="Descripcion breve" id="description" name="description">{{ $carrusel->description }}</textarea>
                            </div>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-group">
                                <label for="position">Alinear el cuadro transparente</label>

                                <div class="form-check">
                                    <input class="" type="radio" name="position" value="start" @if(old('position', $carrusel->position) == 'start') checked @endif>
                                    <label class="form-check-label text-success" for="position">
                                        Izquierda
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="radio" name="position" value="center" @if(old('position', $carrusel->position) == 'center') checked @endif >
                                    <label class="form-check-label text-success" for="position">
                                        Centro
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="radio" name="position" value="end" @if(old('position', $carrusel->position) == 'end') checked @endif >
                                    <label class="form-check-label text-success" for="position">
                                        Derecha
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="visible">Mostrar u Ocultar el Título y la Descripción</label>

                                <div class="form-check">
                                    <input class="" type="radio" name="visible" value="1" @if(old('visible', $carrusel->visible) == '1') checked @endif>
                                    <label class="form-check-label text-primary" for="visible">
                                        Visible
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="radio" name="visible" value="0" @if(old('visible', $carrusel->visible) == '0') checked @endif >
                                    <label class="form-check-label text-primary" for="noVisible">
                                        Oculto
                                    </label>
                                </div>
                            </div>

                            <p class="text-secondary">_____________Sección del botón_____________</p>
                            <div class="form-group">
                                <label for="title_button">Título del botón</label>
                                <input class="form-control" placeholder="Ej. Ver mas" name="title_button" type="text"
                                    id="title_button" value="{{ $carrusel->title_button }}" required>
                            </div>
                            <div class="form-group">
                                <label for="url_button">Enlace del botón</label>
                                <input class="form-control" placeholder="Ej. https://culking.com/alex" name="url_button" type="text"
                                    id="url_button" value="{{ $carrusel->url_button }}" required>
                            </div>


                            <div class="form-group">
                                <label for="color_button">Color del botón</label>
                                <input class="form-control" name="color_button" type="color"
                                    id="color_button" value="{{ old('color_button', $carrusel->color_button ?? '#ff0000') }}" required>
                            </div>
                            <p class="text-secondary">_____________Sección del carrusel_____________</p>
                            <div class="form-group">
                                <label for="visible">Habilitar y deshabilitar carrusel</label>

                                <div class="form-check">
                                    <input class="" type="radio" name="status" value="1" @if(old('status', $carrusel->status) == '1') checked @endif>
                                    <label class="form-check-label text-primary" for="status">
                                        Habilitado
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="radio" name="status" value="0" @if(old('status', $carrusel->status) == '0') checked @endif >
                                    <label class="form-check-label text-primary" for="status">
                                        Deshabilitado
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" accept="image/*" name="image"
                                    onchange="previewImage(event, '#imgPreview')">
                                <img class="mt-3" id="imgPreview" src="{!! old(
                                    'image',
                                    $carrusel->url_image ??
                                        'https://e7.pngegg.com/pngimages/854/638/png-clipart-computer-icons-preview-batch-miscellaneous-angle-thumbnail.png',
                                ) !!}" width="300"
                                    height="200">
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div id="image_demo" style="width:300; height:300;margin-top:30px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success ml-3">Actualizar</button>
                            </div>
                    </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    </div>
@stop

@section('css')
    <style>
        .counter {
            float: right;
            padding: 0.1rem 0 0 0;
            font-size: 0.875rem;
        }
    </style>
@stop

@section('js')
    <script>
        function previewImage(event, querySelector) {

            //Recuperamos el input que desencadeno la acción
            const input = event.target;

            //Recuperamos la etiqueta img donde cargaremos la imagen
            $imgPreview = document.querySelector(querySelector);

            // Verificamos si existe una imagen seleccionada
            if (!input.files.length) return

            //Recuperamos el archivo subido
            file = input.files[0];

            //Creamos la url
            objectURL = URL.createObjectURL(file);

            //Modificamos el atributo src de la etiqueta img
            $imgPreview.src = objectURL;
        }
    </script>
@stop
