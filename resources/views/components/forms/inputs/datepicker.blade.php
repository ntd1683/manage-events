@props([
    'id' => 'datepicker'
])
<div class="input-group">
    <input type="text" {{ $attributes->merge(['class' => 'form-control']) }} id="{{ $id }}">
    <label class="input-group-text" for="{{ $id }}">
        <i class="fa fa-calendar"></i>
    </label>
</div>
