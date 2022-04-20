<?php
require 'app/config/connect.php';
//login, register handler
require 'app/controllers/auth/register_handler.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Creative Colorlib SignUp Form</title>
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
				<h1>SIGN-UP FORM</h1>
				<form action="signup.php" method="POST">
					<input class="text" type="text" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])) { //Start the SESSION to remain users input
																											echo $_SESSION['reg_fname'];
																										} ?>" required>

					<?php if (in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>

					<input class="text email" type="text" name="reg_lname" placeholder="Last Name" value="<?php
																											if (isset($_SESSION['reg_lname'])) {
																												echo $_SESSION['reg_lname'];
																											} ?>" required>

					<?php if (in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>

					<select class="text" name="reg_position" placeholder="Position">
						<option value="none" selected>Select your position</option>
						<option value="Staff">Staff</option>
						<option value="Branch Manager">Branch Manager</option>
						<option value="Admin">Admin</option>
					</select>
					<?php if (in_array("Please choose your position!<br>", $error_array)) echo "Please choose your position!<br>"; ?>

					<input class="text email" type="email" name="reg_email" placeholder="Email" value="<?php
																										if (isset($_SESSION['reg_email'])) {
																											echo $_SESSION['reg_email'];
																										} ?>" required>
					<?php if (in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
					else if (in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
					else if (in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>

					<input class="text" type="password" name="reg_password" placeholder="Password" required>

					<?php if (in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
					else if (in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					else if (in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo "Your password must be between 5 and 30 characters<br>"; ?>
					<input type="submit" value="SIGN-UP" name="register_button">
				</form>
				<?php if (in_array("<span>Wait the approval of your account. Thank You!</span><br>", $error_array)) echo "<span>Wait the approval of your account. Thank You!</span><br>"; ?>
				<!-- <p>Wait the approval of your account. Thank You!</p><br> -->
				<p>Already have an Account? <a href="login.php"> SIGN IN!</a></p>
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