@props([
    'id' => 'radio',
    'checked' => '0',
    'value' => '0'
])
<input type="radio"
       {{ $attributes->merge(['class' => 'form-check-input']) }}
       id="{{ $id }}" value="{{ $value }}"
    @checked($value == $checked)
>
<label class="form-check-label" for="{{ $id }}">{{ $slot }}</label>
