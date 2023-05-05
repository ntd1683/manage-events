<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>HUD | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />

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
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
