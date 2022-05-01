<?php
require_once '../../../config/connect.php';
include '../../flash_message.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE users SET status='Rejected' WHERE id='$id'";

    $fetch_user_details = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
    $user_details = mysqli_fetch_array($fetch_user_details);

    // START PHP MAILER
    require_once '../../../../classes/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
    $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '587';                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'bannedefused3@gmail.com';                    //Sets SMTP username
    $mail->Password = '0639854227101msdcfredsw';                    //Sets SMTP password
    $mail->SMTPSecure = 'tls';                            //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = $user_details['email'];                    //Sets the From email address for the message
    $mail->FromName = "Loaning System";                //Sets the From name of the message
    $mail->AddAddress('bannedefused3@gmail.com', 'banne');        //Adds a "To" address
    $mail->AddCC($user_details['email'], $user_details['last_name']);    //Adds a "Cc" address
    $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                            //Sets message type to HTML				
    $mail->Subject = "support.loaning-system@gmail.com - Account has been Rejected";                //Sets the Subject of the message
    $mail->Body = "									
		<html>
			<body>
                <p>
                Hi " . $user_details['first_name'] . " " . $user_details['first_name'] . ",
                </p>
				<p style='color: black;'>
				Your account has been rejected. You didn't pass the minimum requirements <br />
                Contact Us: loremipsum@gmail.com / support.loaning-system@gmail.com
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

    // Check User if approved
    $check_user_status = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
    $row = mysqli_fetch_array($check_user_status);
    $status = $row['status'];

    if ($status == "Rejected") {
        flash("warning", "User is Already Rejected!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if ($con->query($sql) === TRUE) {
        flash("success", "User Rejected Succesfully!");

        // echo "Record updated successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}
