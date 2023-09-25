

<div class="form-group">
    <label> <strong>Título:</strong> <b class="text-danger"> *</b></label>
    <input type="text" maxlength="100" name="title" id="title" class="form-control" value="{{old('title', $post->title ?? '')}}" required/>
    <div class="counter"><span id="charNum">0</span></div>
    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label><strong>Descripción: </strong></label><b class="text-danger"> *</b>
    <textarea class="form-control" maxlength="150" name="extract" required>{!!old('extract', $post->extract ?? '')!!}</textarea>
    <div class="counter text-secondary">0 / 150</div>
    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- <div class="form-group">
    <label> <strong>Slug:</strong> </label>
    <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug', $post->slug ?? '')}}" required/>
</div> --}}

<div class="form-group">
    <label><strong>Portada:</strong></label><b class="text-danger"> *</b>
    <input type="file" accept="image/*" name="url" onchange="previewImage(event, '#imgPreview')">
    <img class="mt-3" id="imgPreview" src="{!!old('url', $post->url ?? 'https://e7.pngegg.com/pngimages/854/638/png-clipart-computer-icons-preview-batch-miscellaneous-angle-thumbnail.png')!!}" height="150">
    @error('url')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label> <strong>Autor de la portada:</strong> <b class="text-danger"> *</b></label>
    <input type="text" name="image_author" id="image_author" class="form-control" value="{{old('image_author', $post->image_author ?? '')}}" placeholder="Ej: Publicación Salvaje (Foto: Icon Culking)"/>

    @error('image_author')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<!-- Button trigger modal -->
@isset($post)
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar código
    </button>
@endisset

<div class="form-group">
    <label><strong>Cuerpo:</strong></label><b class="text-danger"> *</b>
    <textarea class="editor form-control" name="body">{!!old('body', $post->body ?? '<br><strong>FUENTES:</strong><br><a href="https://noticias.culking.com/">https://noticias.culking.com/</a>')!!}</textarea>
    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success btn-submit">Guardar</button>
</div>
