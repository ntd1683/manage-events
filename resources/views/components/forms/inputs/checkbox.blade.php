@props([
    'id' => 'checkbox',
    'checked' => '0',
])
<input type="checkbox" {{ $attributes->merge(['class' => 'form-check-input']) }} id="{{ $id }}" @checked($checked == 1)>
<label class="form-check-label" for="{{ $id }}">{{ $slot }}</label>
