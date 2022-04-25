<?php
require_once '../config/connect.php';
include './flash_message.php';

//-- Declaring variables to prevent errors --//
$first_name = "";
$last_name = "";
$middle_name = "";
$category = "";
$address = "";
$email = "";
$dob = "";
$mobile = "";
$card_number = "";
$mother_name = "";
$father_name = "";
$spouse_name = "";
$contact_person = "";
$contact_number = "";
$s_contact_number = "";
$company_affiliated = "";
$company_address = "";
$company_number = "";
$position = "";
$work_status = "";

// Get Current User
$userLoggedIn = $_SESSION['username'];
$id = $_SESSION['id'];

// Error Varible Container
$error_array = "";

if (isset($_POST['edit_profile'])) {

    $first_name = strip_tags($_POST['first_name']);
    $first_name = str_replace(' ', '', $first_name);
    $first_name = ucfirst(strtolower($first_name));

    $last_name = strip_tags($_POST['last_name']);
    $last_name = str_replace(' ', '', $last_name);
    $last_name = ucfirst(strtolower($last_name));

    $middle_name = strip_tags($_POST['middle_name']);
    $middle_name = str_replace(' ', '', $middle_name);
    $middle_name = ucfirst(strtolower($middle_name));

    $category = strip_tags($_POST['category']);

    $address = strip_tags($_POST['address']);

    $email = strip_tags($_POST['email']);

    $dob = strip_tags($_POST['dob']);

    $mobile = strip_tags($_POST['mobile']);

    $card_number = strip_tags($_POST['card_number']);

    $mother_name = strip_tags($_POST['mother_name']);
    $mother_name = str_replace(' ', '', $mother_name);
    $mother_name = ucfirst(strtolower($mother_name));

    $father_name = strip_tags($_POST['father_name']);
    $father_name = str_replace(' ', '', $father_name);
    $father_name = ucfirst(strtolower($father_name));

    $spouse_name = strip_tags($_POST['spouse_name']);
    $spouse_name = str_replace(' ', '', $spouse_name);
    $spouse_name = ucfirst(strtolower($spouse_name));

    $contact_person = strip_tags($_POST['contact_person']);

    $contact_number = strip_tags($_POST['contact_number']);

    $s_contact_number = strip_tags($_POST['s_contact_number']);

    $company_affiliated = strip_tags($_POST['company_affiliated']);
    $company_affiliated = ucfirst(strtolower($company_affiliated));

    $company_address = strip_tags($_POST['company_address']);
    $company_address = ucfirst(strtolower($company_address));

    $company_number = strip_tags($_POST['company_number']);

    $position = strip_tags($_POST['position']);
    $position = ucfirst(strtolower($position));

    $work_status = strip_tags($_POST['work_status']);
    $work_status = ucfirst(strtolower($work_status));

    //-- Validation Message --//
    $current_personal = mysqli_query($con, "SELECT * FROM personal where user_id=$id");
    $personal = mysqli_fetch_array($current_personal); //Fetch Current User Columns

    $m_check = mysqli_query($con, "SELECT mobile FROM personal where mobile=$mobile");
    $num_mobile = mysqli_num_rows($m_check); // return 1

    $card_check = mysqli_query($con, "SELECT card_number FROM personal WHERE card_number='$card_number'");
    $num_card = mysqli_num_rows($card_check); // return 1

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
        $num_rows = mysqli_num_rows($e_check);

        if ($email == $e_check  && $num_rows > 0) {
            $error_array = "1";
            flash("error", "Email already in use!");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $error_array = "1";
        flash("error", "Invalid Email Format!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    // Check Mobile and Card Number is Unique
    if ($personal['mobile'] == $mobile) {
    } else {
        if ($num_mobile > 0) {
            $error_array = "1";
            flash("error", "Mobile is already registered!");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    if ($personal['card_number'] == $card_number) {
    } else {
        if ($num_card > 0) {
            $error_array = "1";
            flash("error", "Card Number is already registered!");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    //-- Inserting Data --//
    if (empty($error_array)) { //If No Error Statement
        $user_query = mysqli_query($con, "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE username='$userLoggedIn'");
        $personal_query = mysqli_query($con, "UPDATE personal SET middle_name='$middle_name', category='$category', address='$address', dob='$dob', mobile='$mobile',
            card_number='$card_number', mother_name='$mother_name', father_name='$father_name', spouse_name='$spouse_name', contact_person='$contact_person',
            contact_number='$contact_number', s_contact_number='$s_contact_number', company_affiliated='$company_affiliated', company_address='$company_address',
            company_number='$company_number', position='$position', work_status='$work_status' WHERE user_id='$id'");

        //Editing Successful Message
        flash("success", "Profile Updated Successfully!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    $con->close();
}
