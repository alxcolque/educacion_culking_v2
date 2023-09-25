<div>
    <form wire:submit.prevent="submit" class="row g-3" autocomplete="off">
        @csrf
        <div>
            @include('layouts.alerts')
        </div>
        <input wire:model="post_id" name="post_id" type="hidden" value="{{$post_id}}">
        <div class="col-md-3">
            <input wire:model="html_id" type="text" class="form-control form-control-sm" id="html_id"
                name="html_id" placeholder="ej: code1">
            @error('html_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-7">
            <input wire:model="gist_link" type="text" class="form-control form-control-sm" id="gist_link"
                name="gist_link" placeholder="link">
            @error('gist_link')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-2">
            <button wire:click="callFunctionArg({{$post_id}})" type="submit" class="btn btn-success btn-sm mb-3">OK</button>
        </div>
    </form>
    @if (count($codes) > 0)
    <div class="table-responsive">
        <table class="table table-sm align-middle">
            <thead>
                <th>ID</th>
                <th>LINK</th>
                <th>Opción</th>
            </thead>
            <tbody>
                @foreach ($codes as $code)
                    <tr>
                        <td>{{ $code->html_id }}</td>
                        <td>{{ $code->gist_link }}</td>
                        <td>
                            <button wire:click="deleteCode({{$code->id}})" class="btn btn-danger btn-sm"><i class='bx bxs-trash' ></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p>No hay datos que mostrar...</p>
    @endif
</div>
