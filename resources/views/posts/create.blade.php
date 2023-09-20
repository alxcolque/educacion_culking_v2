@extends('layouts.app')

@section('title')
Culking - publicaciones
@endsection
@section('menu')
    @include('layouts.menu')
@endsection
@section('content')
    <div class="container mt-3">
        <a href="{{ route('posts.index') }}">Atrás</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h3>Editor de publicaciones</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data"
                            autocomplete="off" novalidate>
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-6 mb-3">
                                    <label> <strong>Tipo:</strong> </label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="">--Seleccione un tipo--</option>
                                        <option value="noticia">noticia</option>
                                        <option value="comunicado">comunicado</option>
                                        <option value="tutorial">tutorial</option>
                                        <option value="curso">curso</option>
                                        <option value="tramite">trámite</option>
                                        <option value="unidad">unidad educativa</option>
                                        <option value="distrital">distrital</option>
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label> <strong>Categoria:</strong> </label>
                                    <select class="form-select" name="category_id" id="category_id">
                                        <option value="">--Seleccione la categoría--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <p><strong>Etiquetas</strong></p><label>
                                @foreach ($tags as $tag)
                                    <label class="mr-2 fst-italic text-primary">
                                        <input type="checkbox" name='tags[]' value="{{$tag->id}}">{{ '#'.$tag->name}} </label>
                                    </label>
                                @endforeach
                            </div>


                            @include('posts.fields')
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
    {{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
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
        /* $(document).ready(function() {
                $('.editor').ckeditor();
            }); */
        tinymce.init({
            selector: 'textarea.editor',
            height: 600,
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
    <script>
        var slug = function(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }

        $('#name').keyup(function() {
            $('#slug').val(slug($('#name').val()));
        });

        var textareas = document.querySelectorAll('textarea');

        textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            var charCount = textarea.value.length;
            var count = textarea.nextElementSibling;

            count.innerHTML = charCount + ' /150';
        })
        })
        const $charNum = $('#charNum');

        $('#name').on('input', e => {
            let len = e.target.value.length;
            $charNum.text(50 - len);
        }).trigger('input');
    </script>
@stop
