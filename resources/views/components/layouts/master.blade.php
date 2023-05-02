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
    <meta charset="utf-8" />
    <title>HUD</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
          name="viewport" />

    <!-- core-css -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
{{--    <link href="assets/css/vendor.css" rel="stylesheet" />--}}

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

<!-- BEGIN core-js -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
