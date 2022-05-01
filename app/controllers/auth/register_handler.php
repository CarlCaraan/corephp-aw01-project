<?php
//-- Declaring variables to prevent errors --//
$first_name = "";
$last_name = "";
$email = "";
$password = "";
$usertype = "";
$date = "";
$status = "Pending";
$error_array = array();

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
    $email = strtolower($email); //Uppercase first letter
    $_SESSION['reg_email'] = $email; //Stores email into session variable

    //Password
    $password = strip_tags($_POST['reg_password']); //Remove html tags

    //Usertype
    $usertype = strip_tags($_POST['reg_usertype']); //Remove html tags
    $usertype = ucfirst(strtolower($usertype)); //Uppercase first letter


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

    if (strlen($usertype) == 4) {
        array_push($error_array, "Please choose your Usertype!<br>");
    }

    if (strlen($password) < 5 || strlen($password) > 30) {
        array_push($error_array, "Your password must be between 5 and 30 characters<br>");
    }

    //-- End Email, Name, and Password Validation Message --//


    //-- Start of Error Validation --//
    if (empty($error_array)) { //If No Error Statement

        // START PHP MAILER
        require 'classes/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '587';                                //Sets the default SMTP server port
        $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'bannedefused3@gmail.com';                    //Sets SMTP username
        $mail->Password = '0639854227101msdcfredsw';                    //Sets SMTP password
        $mail->SMTPSecure = 'tls';                            //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = $_POST["reg_email"];                    //Sets the From email address for the message
        $mail->FromName = "Loaning System";                //Sets the From name of the message
        $mail->AddAddress('bannedefused3@gmail.com', 'banne');        //Adds a "To" address
        $mail->AddCC($_POST["reg_email"], $_POST["reg_lname"]);    //Adds a "Cc" address
        $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);                            //Sets message type to HTML				
        $mail->Subject = "support.loaning-system@gmail.com - Wait For your Approval";                //Sets the Subject of the message
        $mail->Body = "									
		<html>
			<body>
                <p>
                Hi " . $_POST['reg_fname'] . " " . $_POST['reg_lname'] . ",
                </p>
				<p style='color: black;'>
				Please wait 1-3 Business Days for approval of your account.
				</p>
                <br/>

                <small> ============================================ </small><br/>
                <small> *** This is an automated message please do not reply. *** </small><br/>
                <small> ============================================ </small>
			</body>
		</html>"; // Customize Html Template

        if ($mail->Send()) //Send an Email. Return true on success or false on error
        {
            $error = '<label class="text-success">Thank you for contacting us</label>';
        } else {
            $error = '<label class="text-danger">There is an Error</label>';
        }
        // END PHP MAILER



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
			'', '$first_name', '$last_name', '$username', '$email', '$password', '$usertype', '$status', '$date'
		)");

        $fetch = mysqli_query($con, "SELECT * from users WHERE email='$email'");
        $row = mysqli_fetch_array($fetch);
        $user_id = $row['id'];

        // Generate Card Number
        if ($user_id < 10) {
            $card_number = date("Y") . '-000' . $user_id;
        } elseif ($user_id < 100) {
            $card_number = date("Y") . '-00' . $user_id;
        } elseif ($user_id < 1000) {
            $card_number = date("Y") . '-0' . $user_id;
        }

        $query1 = mysqli_query($con, "INSERT INTO personal VALUES (
			'', '$user_id','','','','','','$card_number','','','','','','','','','','','',''
		)");


        //Register Successful Message
        array_push($error_array, "<span>Check Your Email and Wait the approval of your account. Thank You!</span><br>");

        //Clear Session Variables
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
    } //End of If No Error Statement
    //-- End of Error Validation --//

} //-- End Register Button --//
