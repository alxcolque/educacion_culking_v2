@extends('layouts.app')

@section('title')
    Carruseles
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

                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('carrusels.store') }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">

                                <div class="col-md-8 mt-2">
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input class="form-control" placeholder="Ingrese el titulo del carrusel"
                                            name="title" type="text" id="title" required
                                            onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea class="form-control" rows="3" placeholder="Descripcion breve" id="description" name="description"></textarea>
                                    </div>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    {{-- <div class="form-group">
                                        <input type="file" name="image" id="before_crop_image" class="image" accept="image/*" />

                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror --}}



                                </div>
                                <div class="col-md-4">
                                    {{-- Imagen carrusel --}}
                                    <div class="form-group">
                                        <input type="file" accept="image/*" name="image"
                                            onchange="previewImage(event, '#imgPreview')">
                                        <img class="mt-3" id="imgPreview" src="{!! old(
                                            'image',
                                            $carrusel->image ??
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
                                    {{-- Imagen carrsusel --}}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- Fin contenido -->
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script type="text/javascript">
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
