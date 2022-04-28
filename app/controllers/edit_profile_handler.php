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

// Error Varible Container
$error_array = "";

// Get Current User
$userLoggedIn = $_SESSION['username'];
$id = $_SESSION['id'];

// Get Personal Table
$current_personal = mysqli_query($con, "SELECT * FROM personal where user_id=$id");
$personal = mysqli_fetch_array($current_personal); //Fetch Current User Columns

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
    $email = str_replace(' ', '', $email);
    $email = strtolower($email);

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

    //-- Start Validation Message --//
    if (strlen($first_name) > 25 || strlen($first_name) < 2) {
        $error_array = "1";
        flash("error", "First Name must be between 2 and 25 characters!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if (strlen($last_name) > 25 || strlen($last_name) < 2) {
        $error_array = "1";
        flash("error", "Last Name must be between 2 and 25 characters!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
        $num_rows = mysqli_num_rows($e_check);

        // Get current Email
        $current_email_query = mysqli_query($con, "SELECT email FROM users WHERE username='$userLoggedIn'");
        $current_email = mysqli_fetch_array($current_email_query);;

        if ($current_email['email'] == $email) {
            //do nothing
        } else {
            if ($num_rows > 0) {
                $error_array = "1";
                flash("error", "Email already in use!");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    } else {
        $error_array = "1";
        flash("error", "Invalid Email Format!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    // Check Mobile and Card Number is Unique
    $m_check = mysqli_query($con, "SELECT mobile FROM personal where mobile=$mobile");
    $num_mobile = mysqli_num_rows($m_check); // return 1

    $card_check = mysqli_query($con, "SELECT card_number FROM personal WHERE card_number='$card_number'");
    $num_card = mysqli_num_rows($card_check); // return 1

    if ($mobile == "" || $card_number == "") {
    } else {
        if ($personal['mobile'] == $mobile) {
            if ($personal['card_number'] == $card_number) {
            } else {
                if ($num_card > 0) {
                    $error_array = "1";
                    flash("error", "Card Number is already registered!");
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            if ($num_mobile > 0) {
                $error_array = "1";
                flash("error", "Mobile Number is already registered!");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            if ($personal['card_number'] == $card_number) {
            } else {
                if ($num_card > 0) {
                    $error_array = "1";
                    flash("error", "Card Number is already registered!");
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

    //-- End Validation Message --//

    // Working with Image
    $check_image = strip_tags($_FILES['image']['name']);
    if (strlen($check_image) > 0) {
        $file_name = date("Y-m-d h-i-s") . "." . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $expensions = array("jpeg", "jpg", "png");
        if ($file_size == 0) {
            $error_array = "1";
        }
        if (in_array($file_ext, $expensions) === false) {
            $error_array = "1";
            flash("error", "please choose a JPEG or PNG file!");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        if ($file_size > 5097152) {
            $error_array = "1";
            flash("error", "File size must be 5 MB or less!");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        unlink('../../resources/img/uploads/' . $personal['image']);
    } else {
        $file_name = $personal['image'];
    }

    //-- Inserting Data --//
    if (empty($error_array)) { //If No Error Statement
        move_uploaded_file($file_tmp, "../../resources/img/uploads/" . $file_name);

        $user_query = mysqli_query($con, "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE username='$userLoggedIn'");
        $personal_query = mysqli_query($con, "UPDATE personal SET middle_name='$middle_name', category='$category', address='$address', dob='$dob', mobile='$mobile',
            card_number='$card_number', mother_name='$mother_name', father_name='$father_name', spouse_name='$spouse_name', contact_person='$contact_person',
            contact_number='$contact_number', s_contact_number='$s_contact_number', company_affiliated='$company_affiliated', company_address='$company_address',
            company_number='$company_number', position='$position', work_status='$work_status', image='$file_name' WHERE user_id='$id'");

        //Editing Successful Message
        flash("success", "Profile Updated Successfully!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    $con->close();
}

// Delete Image
if (isset($_POST['delete_image'])) {
    $file_name = "";

    $personal_query = mysqli_query($con, "UPDATE personal SET image='$file_name' WHERE user_id='$id'");
    unlink('../../resources/img/uploads/' . $personal['image']);
    flash("success", "Image Removed Successfully!");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
