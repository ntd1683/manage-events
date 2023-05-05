<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>{{ __('Login')}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	
	<!-- ================== BEGIN core-css ================== -->
	<!-- <link href="assets/css/vendor.min.css" rel="stylesheet" /> -->
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	
</head>
<body class='pace-top'>
	<!-- BEGIN #app -->
	<div id="app" class="app app-full-height app-without-header">
		<!-- BEGIN login -->
		<div class="login">
			<!-- BEGIN login-content -->
			<div class="login-content">
				<form action="index.html" method="POST" name="login_form">
					<h1 class="text-center">{{ __('Log In')}}</h1>
					<div class="text-white text-opacity-50 text-center mb-4">
					{{ __('For your protection, please verify your identity.')}}
					</div>
					<div class="mb-3">
						<label class="form-label">{{ __('Email Address')}} <span class="text-danger">{{ __('*')}}</span></label>
						<input type="text" class="form-control form-control-lg bg-white bg-opacity-5" value="" placeholder="" />
					</div>
					<div class="mb-3">
						<div class="d-flex">
							<label class="form-label">{{ __('Password')}} <span class="text-danger">{{ __('*')}}</span></label>
							<a href="forgot-password" class="ms-auto text-white text-decoration-none text-opacity-50">{{ __('Forgot password?')}}</a>
						</div>
						<input type="password" class="form-control form-control-lg bg-white bg-opacity-5" value="" placeholder="" />
					</div>
					<div class="mb-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="customCheck1" />
							<label class="form-check-label" for="customCheck1">{{ __('Remember me')}}</label>
						</div>
					</div>
					<button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Log In</button>
					<div class="text-center text-white text-opacity-50">
					{{ __("Don't have an account yet?")}} <a href="register">{{ __('Sign up')}}</a>.
					</div>
				</form>
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<!-- <script src="assets/js/vendor.min.js"></script> -->
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- ================== END core-js ================== -->
</body>
</html>