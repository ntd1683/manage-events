<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>HUD | Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	
</head>
<body class='pace-top'>
	<!-- BEGIN #app -->
	<div id="app" class="app app-full-height app-without-header">
		<!-- BEGIN register -->
		<div class="register">
			<!-- BEGIN register-content -->
			<div class="register-content">
				<form action="index.html" method="POST" name="register_form">
					<h1 class="text-center">Sign Up</h1>
					<p class="text-white text-opacity-50 text-center">One Admin ID is all you need to access all the Admin services.</p>
					<div class="mb-3">
						<label class="form-label">Name <span class="text-danger">*</span></label>
						<input type="text" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="e.g John Smith" value="" />
					</div>
					<div class="mb-3">
						<label class="form-label">Email Address <span class="text-danger">*</span></label>
						<input type="text" class="form-control form-control-lg bg-white bg-opacity-5" placeholder="username@address.com" value="" />
					</div>
					<div class="mb-3">
						<label class="form-label">Password <span class="text-danger">*</span></label>
						<input type="password" class="form-control form-control-lg bg-white bg-opacity-5" value="" />
					</div>
					<div class="mb-3">
						<label class="form-label">Confirm Password <span class="text-danger">*</span></label>
						<input type="password" class="form-control form-control-lg bg-white bg-opacity-5" value="" />
					</div>
					<div class="mb-3">
						<label class="form-label">Country <span class="text-danger">*</span></label>
						<select class="form-select form-select-lg bg-white bg-opacity-5">
							<option>United States</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Gender <span class="text-danger">*</span></label>
						<select class="form-select form-select-lg bg-white bg-opacity-5">
							<option>Female</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Date of Birth <span class="text-danger">*</span></label>
						<div class="row gx-2">
							<div class="col-6">
								<select class="form-select form-select-lg bg-white bg-opacity-5">
									<option>Month</option>
								</select>
							</div>
							<div class="col-3">
								<select class="form-select form-select-lg bg-white bg-opacity-5">
									<option>Day</option>
								</select>
							</div>
							<div class="col-3">
								<select class="form-select form-select-lg bg-white bg-opacity-5">
									<option>Year</option>
								</select>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="customCheck1" />
							<label class="form-check-label" for="customCheck1">I have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</label>
						</div>
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-outline-theme btn-lg d-block w-100">Sign Up</button>
					</div>
					<div class="text-white text-opacity-50 text-center">
						Already have an Admin ID? <a href="page_login.html">Sign In</a>
					</div>
				</form>
			</div>
			<!-- END register-content -->
		</div>
		<!-- END register -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- ================== END core-js ================== -->
	
	
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

	</script>
</body>
</html>
