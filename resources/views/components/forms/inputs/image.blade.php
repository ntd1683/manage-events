@props([
    'value' => '',
    'name' => '',
])
<div class="imgUp">
    <img src="{{ asset('images/default.png') }}" alt="{{ $name }}" class="imagePreview" style="width:13rem; height:auto">
    <div class="margin-top-5" style="margin-left:4rem;">
        <label class="btn btn-outline-info">
            {{ __('Upload') }}
            <input type="file" class="uploadFile img" value="{{ $value }}"
                   style="width: 0;height: 0;overflow: hidden;" name="{{ $name }}">
        </label>
    </div>
</div>

