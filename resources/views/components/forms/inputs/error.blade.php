@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'mt-1 text-red-600']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
