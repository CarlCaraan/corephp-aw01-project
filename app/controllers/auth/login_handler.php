<?php
$error_array = array();

if (isset($_POST['login_button'])) {
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email
    $_SESSION['log_email'] = $email; //Store email into session variable
    $password = md5($_POST['log_password']); //Get password

    // Verify Email and Password
    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    // Verify Status and Usertype
    if ($check_login_query == 1) {
        $check_data_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
        $row = mysqli_fetch_array($check_data_query);
        $status = $row['status'];
        $usertype = $row['usertype'];
        $id = $row['id'];
    }

    if ($check_login_query == 1 && $status == "Pending") {
        array_push($error_array, "Your account is not yet approved!<br>");
    } else if ($check_login_query == 1 && $status == "Rejected") {
        array_push($error_array, "Your account has been rejected!<br>");
    } else if ($check_login_query == 1 && $usertype == "Admin") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        $login_details_query = mysqli_query($con, "INSERT INTO login_details (user_id) VALUES ($id)");
        $_SESSION['login_details_id'] = mysqli_insert_id($con);

        header("Location: admin/dashboard");
        exit();
    } else if ($check_login_query == 1 && $usertype == "Branch Manager") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        $login_details_query = mysqli_query($con, "INSERT INTO login_details (user_id) VALUES ($id)");
        $_SESSION['login_details_id'] = mysqli_insert_id($con);

        header("Location: branch_manager/dashboard");
        exit();
    } else if ($check_login_query == 1 && $usertype == "Staff") { //Login query
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $_SESSION['username'] = $username;

        $login_details_query = mysqli_query($con, "INSERT INTO login_details (user_id) VALUES ($id)");
        $_SESSION['login_details_id'] = mysqli_insert_id($con);

        header("Location: staff/dashboard");
        exit();
    } else {
        array_push($error_array, "Email or password was incorrect<br>");
    } //End login query
}
