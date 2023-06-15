@php
    use Illuminate\Support\Js;

    $translations = trans('*');
    $translations = $translations === '*' ? [] : $translations;
    $themeMode = $_COOKIE['theme'] ?? null;

    if (! in_array($themeMode, ['light', 'dark'])) {
        $themeMode = 'light';
    }
@endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['h-full no-js', $themeMode])>
<head>
    <meta charset="utf-8"/>
    <title>{{ option('site_name', config('app.name')) }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
          name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ Storage::url(option('site_favicon')) }}">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>
    @stack('css')

    <script>
        window.App = {{ Js::from([
            'locale' => app()->getLocale(),
            'translations' => $translations,
        ]) }}
    </script>
</head>
<body>
<div id="app" class="app">
    <!-- app-header -->
    <x-layouts.partials.header/>

    <!-- app-sidebar -->
    <x-layouts.partials.sidebar/>

    <!-- app-content -->
    <div id="content" class="app-content">
        {{ $slot }}
    </div>

    <!-- btn-scroll-top -->
    <x-layouts.partials.scroll-top/>
</div>

<!-- Toast -->

<div class="toasts-container">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-toast status="error" title="Error" time="1s ago" class="border-danger">
                {{ $error }}
            </x-toast>

            <script>
                window.addEventListener('load', () => {
                    $('.toast-error').toast('show');
                });
            </script>
        @endforeach
    @endif
    <x-toast status="success" title="Success" time="1s ago">
        {{ session()->get('success') }}
    </x-toast>
    @if (session()->has('success'))
        <script>
            window.addEventListener('load', () => {
                $('.toast-success').toast('show');
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            window.addEventListener('load', () => {
                $('.toast-error').toast('show');
            });
        </script>
    @endif
    <!-- Toast -->
</div>
<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
</body>
</html>
