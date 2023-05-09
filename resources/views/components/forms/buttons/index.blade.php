@props([
    'style' => 'primary',
    'type' => 'button'
])
<button type="{{ $type }}" {{ $attributes->merge(["class" => "btn btn-outline-theme"]) }}>{{ $slot }}</button>
