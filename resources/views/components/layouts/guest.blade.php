<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>{{ option('site_name', config('app.name')) }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="{{ Storage::url(option('site_favicon')) }}">

	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

</head>
<body class='pace-top'>
	<!-- BEGIN #app -->
	<div id="app" class="app app-full-height app-without-header">

		{{ $slot }}

        <!-- btn-scroll-top -->
        <x-layouts.partials.scroll-top/>
	</div>

	<!-- END #app -->

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

        @if($error = session()->get('error'))
                <x-toast status="error" title="Error" time="1s ago" class="border-danger">
                    {{ $error }}
                </x-toast>

                <script>
                    window.addEventListener('load', () => {
                        $('.toast-error').toast('show');
                    });
                </script>
        @endif
        <!-- Toast -->
    </div>
    <!-- Toast -->

	<script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/guest.js') }}"></script>
    @stack('js')
</body>
</html>
