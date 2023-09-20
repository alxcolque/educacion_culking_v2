<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title', $category->title ?? '') }}" class="form-control" placeholder="Enter title"  onkeyup="this.value = this.value.toUpperCase();">
    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="icon">Icon</label>
    <input type="file"  accept="image/*" class="form-control" id="icon" name="icon" onchange="previewImage(event, '#imgPreview')">
    <img class="mt-3" id="imgPreview" src="{!!old('icon', $category->icon ?? 'https://e7.pngegg.com/pngimages/854/638/png-clipart-computer-icons-preview-batch-miscellaneous-angle-thumbnail.png')!!}" width="200" height="200">
    @error('icon')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
