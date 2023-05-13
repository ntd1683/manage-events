@props([
    'cols' => '30',
    'rows' => '5',
])
<textarea {{ $attributes->merge(["class" => "form-control"]) }} cols="{{ $cols }}" rows="{{ $rows }}">{{ $slot }}</textarea>
