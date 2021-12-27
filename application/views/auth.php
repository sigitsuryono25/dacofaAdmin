<!DOCTYPE html>
<html dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/images/favicon.png">
	<title>Admin Panel Dacofa</title>
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>/dist/css/style.min.css" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<div class="main-wrapper">
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Login box.scss -->
		<!-- ============================================================== -->
		<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
			<div class="auth-box bg-dark border-top border-secondary">
				<div id="loginform">
					<div class="text-center p-t-20 p-b-20">
						<h4 class="font-weight-bold text-white text-uppercase">Dacofa<br>Admin Panel</h4>
					</div>
					<!-- Form -->
					<form class="form-horizontal m-t-20" id="formLogin">
						<div class="row p-b-30">
							<div class="col-12">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
									</div>
									<input type="text" class="form-control form-control-lg" placeholder="Username" name="username" aria-label="Username" aria-describedby="basic-addon1" required="">
								</div>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
									</div>
									<input type="password" class="form-control form-control-lg" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1" required="">
								</div>
							</div>
						</div>
						<div class="row border-top border-secondary">
							<div class="col-12">
								<div class="form-group">
									<div class="p-t-20 text-center">
										<button class="btn btn-success" type="submit">Login</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- Login box.scss -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Page wrapper scss in scafholding.scss -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Page wrapper scss in scafholding.scss -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right Sidebar -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right Sidebar -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- All Required js -->
	<!-- ============================================================== -->
	<script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="<?= base_url() ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
	<script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugin js -->
	<!-- ============================================================== -->
	<script>
		$('[data-toggle="tooltip"]').tooltip();
		$(".preloader").fadeOut();
		// ============================================================== 
		// Login and Recover Password 
		// ============================================================== 
		$('#to-recover').on("click", function() {
			$("#loginform").slideUp();
			$("#recoverform").fadeIn();
		});
		$('#to-login').click(function() {

			$("#recoverform").hide();
			$("#loginform").fadeIn();
		});

		$("#formLogin").submit(function(e) {
			e.preventDefault();
			var data = $(this).serialize();
			var urlLogin = "<?= site_url('welcome/authProc') ?>";
			$.post(urlLogin, data, function(res) {
				if (res.code == 200) {
					alert(res.message);
					location.assign('<?= site_url('fishery-activity') ?>');
				} else {
					alert(res.message);
				}
			}, 'json')
		});
	</script>

</body>

</html>
