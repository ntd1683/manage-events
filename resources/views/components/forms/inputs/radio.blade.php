@props(['id' => 'radio'])
<input type="radio" {{ $attributes->merge(['class' => 'form-check-input']) }} id="{{ $id }}">
<label class="form-check-label" for="{{ $id }}">{{ $slot }}</label>
