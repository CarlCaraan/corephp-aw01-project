<?php
require 'app/config/connect.php';
//login, register handler
require 'app/controllers/auth/register_handler.php';
require 'app/controllers/auth/login_handler.php';
?>


<!DOCTYPE html>
<html>

<head>
	<title>Login | App</title>
	<link rel="icon" href="resources/img/login.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="resources/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="resources/css/custom.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- //web font -->
</head>

<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">
				<img class="auth-image center" src="resources/img/login.png" alt="">
				<h1>LOGIN FORM</h1>
				<form action="login" method="POST">
					<input class="text email" type="email" name="log_email" placeholder="Email" required="" value="<?php
																													if (isset($_SESSION['log_email'])) { //Start the SESSION to remain users input
																														echo $_SESSION['log_email'];
																													} ?>">
					<input class="text" type="password" name="log_password" placeholder="Password" required=""><br />
					<!-- Start Validation Message -->
					<p class="validation-text">
						<?php if (in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>"; ?>
						<?php if (in_array("Your account is not yet approved!<br>", $error_array)) echo "Your account is not yet approved!<br>"; ?>
						<?php if (in_array("Your account has been rejected!<br>", $error_array)) echo "Your account has been rejected!<br>"; ?>
					</p>
					<!-- End Validation Message -->

					<input type="submit" name="login_button" value="LOGIN">
				</form>
				<p>Don't have an Account? <a href="signup"> SIGN UP!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<!-- <div class="colorlibcopy-agile">
			<p>© WEB AND DATABASE PROJECT</p>
		</div> -->
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>

</html>