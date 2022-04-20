<?php
//-- Declaring variables to prevent errors --//
$first_name = "";
$last_name = "";
$email = "";
$password = "";
$position = "";
$date = "";
$error_array = array();
$status = "no";

//-- Start Register Button --//
if (isset($_POST['register_button'])) {

    //-- Registration form values --//
    //First name
    $first_name = strip_tags($_POST['reg_fname']); //Remove html tags
    $first_name = str_replace(' ', '', $first_name); //remove spaces
    $first_name = ucfirst(strtolower($first_name)); //Uppercase first letter
    $_SESSION['reg_fname'] = $first_name; //Stores first name into session variable

    //Last name
    $last_name = strip_tags($_POST['reg_lname']); //Remove html tags
    $last_name = str_replace(' ', '', $last_name); //remove spaces
    $last_name = ucfirst(strtolower($last_name)); //Uppercase first letter
    $_SESSION['reg_lname'] = $last_name; //Stores last name into session variable

    //email
    $email = strip_tags($_POST['reg_email']); //Remove html tags
    $email = str_replace(' ', '', $email); //remove spaces
    $email = ucfirst(strtolower($email)); //Uppercase first letter
    $_SESSION['reg_email'] = $email; //Stores email into session variable

    //Password
    $password = strip_tags($_POST['reg_password']); //Remove html tags

    //Position
    $position = strip_tags($_POST['reg_position']); //Remove html tags
    $position = ucfirst(strtolower($position)); //Uppercase first letter


    $date = date("Y-m-d"); //Current date


    //-- Start Email, Name, and Password Validation Message --//
    //Check if email is in valid format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        //Check if email already exists
        $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

        //Count the number of rows returned
        $num_rows = mysqli_num_rows($e_check);

        if ($num_rows > 0) {
            array_push($error_array, "Email already in use<br>");
        }
    } else {
        array_push($error_array, "Invalid email format<br>");
    }

    if (strlen($first_name) > 25 || strlen($first_name) < 2) {
        array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
    }

    if (strlen($last_name) > 25 || strlen($last_name) < 2) {
        array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
    }

    if (preg_match('/[^A-Za-z0-9]/', $password)) {
        array_push($error_array, "Your password can only contain english characters or numbers<br>");
    }

    if (strlen($position) == 4) {
        array_push($error_array, "Please choose your position!<br>");
    }

    if (strlen($password) < 5 || strlen($password) > 30) {
        array_push($error_array, "Your password must be between 5 and 30 characters<br>");
    }

    //-- End Email, Name, and Password Validation Message --//


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
        array_push($error_array, "<span>Wait the approval of your account. Thank You!</span><br>");

        //Clear Session Variables
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
    } //End of If No Error Statement
    //-- End of Error Validation --//

} //-- End Register Button --//
