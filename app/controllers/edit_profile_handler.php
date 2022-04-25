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

$error_array = "";




if (isset($_POST['edit_profile'])) {
    // $check_user_status = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    // $row = mysqli_fetch_array($check_user_status);
    // $first_name = $row['first_name'];
    // $last_name = $row['last_name'];
    // $email = $row['email'];

    $first_name = strip_tags($_POST['first_name']);
    $last_name = strip_tags($_POST['last_name']);
    $middle_name = strip_tags($_POST['middle_name']);
    $category = strip_tags($_POST['category']);
    $address = strip_tags($_POST['address']);
    $email = strip_tags($_POST['email']);
    $dob = strip_tags($_POST['dob']);
    $mobile = strip_tags($_POST['mobile']);
    $card_number = strip_tags($_POST['card_number']);
    $mother_name = strip_tags($_POST['mother_name']);
    $father_name = strip_tags($_POST['father_name']);
    $spouse_name = strip_tags($_POST['spouse_name']);
    $contact_person = strip_tags($_POST['contact_person']);
    $contact_number = strip_tags($_POST['contact_number']);
    $s_contact_number = strip_tags($_POST['s_contact_number']);
    $company_affiliated = strip_tags($_POST['company_affiliated']);
    $company_address = strip_tags($_POST['company_address']);
    $company_number = strip_tags($_POST['company_number']);
    $position = strip_tags($_POST['position']);
    $work_status = strip_tags($_POST['work_status']);



    //-- Validation Message --//





    //-- Inserting Data --//
    if (empty($error_array)) { //If No Error Statement

        $query = mysqli_query($con, "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE username='$userLoggedIn'");

        //Editing Successful Message
        flash("success", "Profile Updated Successfully!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    $con->close();
}
