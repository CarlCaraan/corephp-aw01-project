<?php
require_once '../../../config/connect.php';
include '../../flash_message.php';

//-- Declaring variables to prevent errors --//
$first_name = "";
$last_name = "";
$email = "";
$password = "password";
$position = "";
$date = "";
$status = "Pending";
$error_array = "";

if (isset($_POST['add_account'])) {
    //First name
    $first_name = strip_tags($_POST['first_name']); //Remove html tags
    $first_name = str_replace(' ', '', $first_name); //remove spaces
    $first_name = ucfirst(strtolower($first_name)); //Uppercase first letter
    $_SESSION['first_name'] = $first_name; //Stores first name into session variable

    //Last name
    $last_name = strip_tags($_POST['last_name']); //Remove html tags
    $last_name = str_replace(' ', '', $last_name); //remove spaces
    $last_name = ucfirst(strtolower($last_name)); //Uppercase first letter
    $_SESSION['last_name'] = $last_name; //Stores last name into session variable

    //email
    $email = strip_tags($_POST['email']); //Remove html tags
    $email = str_replace(' ', '', $email); //remove spaces
    $email = ucfirst(strtolower($email)); //Uppercase first letter
    $_SESSION['email'] = $email; //Stores email into session variable

    //Position
    $position = strip_tags($_POST['position']); //Remove html tags
    $position = ucfirst(strtolower($position)); //Uppercase first letter

    //Current date
    $date = date("Y-m-d");

    //-- Validation Message --//
    if (strlen($first_name) > 25 || strlen($first_name) < 2) {
        $error_array = "1";
        flash("error", "Your first name must be between 2 and 25 characters!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if (strlen($last_name) > 25 || strlen($last_name) < 2) {
        $error_array = "1";
        flash("error", "Your last name must be between 2 and 25 characters!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if (strlen($position) == 4) {
        $error_array = "1";
        flash("error", "Position is Required!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
            $num_rows = mysqli_num_rows($e_check);

            if ($num_rows > 0) {
                $error_array = "1";
                flash("error", "Email already in use!");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        } else {
            $error_array = "1";
            flash("error", "Invalid Email Format!");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    //-- Validation Message --//

    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement
        $password = md5($password); //Encrypt password before sending to database

        //Generate username by concatinating first name and last name
        $username = strtolower($first_name . "_" . $last_name);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

        //if username exist add number to username
        $i = 0;
        while (mysqli_num_rows($check_username_query) != 0) {
            $i++; //Add 1 to i
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        }

        //Insert Data to database
        $query = mysqli_query($con, "INSERT INTO users VALUES (
			'', '$first_name', '$last_name', '$username', '$email', '$password', '$position', '$status', '$date'
		)");

        //Register Successful Message
        flash("success", "Account Inserted Successfully!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    $con->close();
}
