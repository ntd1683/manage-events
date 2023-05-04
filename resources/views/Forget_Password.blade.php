<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Forgot password</title>
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
					<h1 class="text-center">CAN'T SIGN IN?</h1>
					<div class="text-white text-opacity-50 text-center mb-4">
					Forgot password? Need help remembering? You can request a reminder be sent to your linked email here.
					</div>
					<div class="mb-3">
						<label class="form-label">Email Address <span class="text-danger">*</span></label>
						<input type="text" class="form-control form-control-lg bg-white bg-opacity-5" value="" placeholder="" />
					</div>
					<button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">→</button>
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