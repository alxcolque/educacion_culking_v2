@extends('layouts.app')

@section('title')
    Instituto | Culking
@stop

@section('menu')
    @include('layouts.menu')
@endsection
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Modificar datos del sistema') }}</div>

                    <div class="card-body">
                        <form action="{{ route('institutions.update', $institution->id) }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row form-group">
                                <div class="col-md-4 mb-3">
                                    <label for="name">Nombre de la institución</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $institution->name }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="file" accept="image/*" name="logo"
                                        onchange="previewImage(event, '#imgPreview')">
                                    <img class="mt-3" id="imgPreview" src="{!! old(
                                        'logo',
                                        $institution->logo ??
                                            'https://e7.pngegg.com/pngimages/854/638/png-clipart-computer-icons-preview-batch-miscellaneous-angle-thumbnail.png',
                                    ) !!}" width="200"
                                        height="57">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="visible_apps">Mostrar u Ocultar las apps</label>

                                    <div class="form-check">
                                        <input class="" type="radio" name="visible_apps" value="1"
                                            @if (old('visible_apps', $institution->visible_apps) == '1') checked @endif>
                                        <label class="form-check-label text-primary" for="visible">
                                            Visible
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="" type="radio" name="visible_apps" value="0"
                                            @if (old('visible_apps', $institution->visible_apps) == '0') checked @endif>
                                        <label class="form-check-label text-primary" for="noVisible">
                                            Oculto
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="contacts">Contactos (Separa con *)</label>
                                <textarea class="form-control" id="contacts" name="contacts">{{ $institution->contacts }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <textarea class="form-control" id="address" name="address">{{ $institution->address }}</textarea>
                            </div>
                            {{-- <div class="form-group">
                                <label for="social">Redes Sociales</label>
                                <textarea class="form-control social" id="social" name="social">{{ $institution->social }}</textarea>
                            </div> --}}
                            <div class="form-group">
                                <label for="about">¿Quienes somos?</label>
                                <textarea class="form-control about" id="about" name="about">{{ $institution->about }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="terms">Términos</label>
                                <textarea class="form-control terms" id="terms" name="terms">{{ $institution->terms }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="privacy">Privacidad</label>
                                <textarea class="form-control privacy" id="privacy" name="privacy">{{ $institution->privacy }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('css')
@stop

@section('js')
    <script src="https://cdn.tiny.cloud/1/cqu9z23sxsssxrvq8aabyju86nlrsh9j57v2u70r0r8gf40q/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
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
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.about',
            //width: 1000,
            height: 400,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menu: {
                favs: {
                    title: 'menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
        });
        tinymce.init({
            selector: 'textarea.terms',
            //width: 1000,
            height: 400,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menu: {
                favs: {
                    title: 'menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
        });
        tinymce.init({
            selector: 'textarea.privacy',
            //width: 1000,
            height: 400,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menu: {
                favs: {
                    title: 'menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
        });
    </script>
@stop
