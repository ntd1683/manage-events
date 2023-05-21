@props([
    'value' => '',
    'name' => '',
])
<div class="imgUp">
    <img src="{{ $value == '' ? asset('images/default.png') : Storage::url($value) }}" alt="{{ $name }}" {{ $attributes->merge(['class' => 'imagePreview']) }} style="width:13rem; height:auto">
    <div class="margin-top-5" style="margin-left:4rem;">
        <label class="btn btn-outline-info">
            {{ __('Upload') }}
            <input type="file" class="uploadFile img" value="{{ $value }}"
                   style="width: 0;height: 0;overflow: hidden;" name="{{ $name }}" accept="image/png, image/jpeg, image/jpg">
        </label>
    </div>
</div>

